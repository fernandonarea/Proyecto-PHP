<?php
require_once 'model/dao/HotelDAO.php';
require_once 'model/dto/Hotel.php';


class HotelController {
    private $hotelDAO;

    public function __construct() {
        $this->hotelDAO = new HotelDAO();
    }
    public function registerHotel() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $totalHabitaciones = $_POST['total_habitaciones'];
            $tipoHotel = $_POST['tipo_hotel'];
            $nombreHotel = $_POST['nombre_hotel'];
            $diasHospedaje = $_POST['dias_hospedaje'];
            $totalPersonas = $_POST['total_personas'];
            $nombreReserva = $_POST['nombre_reserva'];

            $nombreReserva = $_SESSION['usuario']->getNombreCompleto();
    
            // Crear un objeto Hotel
            $hotel = new Hotel();
            $hotel->setTotalHabitaciones($totalHabitaciones);
            $hotel->setTipoHotel($tipoHotel);
            $hotel->setNombreHotel($nombreHotel);
            $hotel->setDiasHospedaje($diasHospedaje);
            $hotel->setTotalPersonas($totalPersonas);
            $hotel->setNombreReserva($nombreReserva);
    
            // Insertar el hotel en la base de datos
            if ($this->hotelDAO->insertarHotel($hotel)) {
                header('Location: index.php?action=home');
                exit();
            } else {
                $mensaje = "Error al registrar el hotel.";
                require_once 'view/hotel/RegistroHotel.php';
            }
        } else {
            require_once 'view/hotel/RegistroHotel.php';
        }
    }
    
    public function mostrarHoteles() {
        // Verificar si el usuario está autenticado
        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] instanceof Usuario) {
            // Obtener el usuario de la sesión
            $usuario = $_SESSION['usuario'];
            $nombreReserva = $usuario->getNombreCompleto();
    
            $hotelDAO = new BoletoDAO();
            // Obtener boletos del comprador
            $hoteles = $this->hotelDAO->obtenerHotelPorNombre($nombreReserva);

            // Cargar la vista de mostrar boletos
            require 'view/hotel/mostarHotel.php';
        } else {
            // Redirigir al login si el usuario no está autenticado
            header('Location: index.php?action=login');
            exit();
        }
    }
    public function editarHotel($id) {
        $hotelDAO = new HotelDAO();
        $hotel = $hotelDAO->obtenerHotelPorId($id);
        if ($hotel) {
            require 'view/hotel/editarHotel.php';
        } else {
            header('Location: index.php?action=mostrarHotel'); // Redirigir a la página de mostrar hoteles
            exit();
        }
    }
    public function actualizarHotel() {
        if (isset($_POST['id'])) {
            // Verifica que todos los datos necesarios estén presentes
            if (isset($_POST['total_habitaciones'], $_POST['tipo_hotel'], $_POST['nombre_hotel'], $_POST['dias_hospedaje'], $_POST['total_personas'], $_POST['nombre_reserva'])) {
                // Crear y configurar el objeto Hotel
                $hotel = new Hotel();
                $hotel->setId($_POST['id']);
                $hotel->setTotalHabitaciones($_POST['total_habitaciones']);
                $hotel->setTipoHotel($_POST['tipo_hotel']);
                $hotel->setNombreHotel($_POST['nombre_hotel']);
                $hotel->setDiasHospedaje($_POST['dias_hospedaje']);
                $hotel->setTotalPersonas($_POST['total_personas']);
                $hotel->setNombreReserva($_POST['nombre_reserva']);
                
                // Intentar actualizar el hotel
                $actualizado = $this->hotelDAO->actualizarHotel($hotel);
                
                if ($actualizado) {
                    header('Location: index.php?action=mostrarHot');
                    exit();
                } else {
                    echo "No se pudo actualizar el hotel.";
                }
            } else {
                echo "Faltan datos en el formulario.";
            }
        } else {
            echo " ";
        }
    }
    public function cancelarReserva() {
        if (isset($_GET['id'])) {
            $hotelID = $_GET['id'];
            $cancelado = $this->hotelDAO->cancelarHotel($hotelID);

            if ($cancelado) {
                header('Location: index.php?action=mostrarHot');
                exit();
            } else {
                echo "No se pudo cancelar el boleto.";
            }
        } else {
            echo "ID de boleto no proporcionado.";
        }
    }
}