<?php
require_once 'model/dao/BoletoDAO.php';
require_once 'model/dto/Boleto.php';

require_once 'UserController.php';

class BoletoController {
    private $boletoDAO;
    private $userController;

    public function __construct() {
        $this->boletoDAO = new BoletoDAO();
        $this->userController = new UserController();
    }

    public function registerBol() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cantidad = $_POST['cantidad'];
            $metodoPago = $_POST['metodoPago'];
            $lugar = $_POST['lugar'];
            $tipoBoleto = $_POST['tipoBoleto'];
            $precioTotal = $_POST['precioTotal'];
            $precioUnidad = $_POST['precioUnidad'];
            $nombreComprador = $_POST['nombreComprador'];
            
            // Obtener el nombre del comprador desde la sesión
            $nombreComprador = $_SESSION['usuario']->getNombreCompleto();

            // Crear un objeto Boleto
            $boleto = new Boleto();
            $boleto->setCantidad($cantidad);
            $boleto->setMetodoPago($metodoPago);
            $boleto->setLugar($lugar);
            $boleto->setTipoBoleto($tipoBoleto);
            $boleto->setPrecioTotal($precioTotal);
            $boleto->setPrecioUnidad($precioUnidad);
            $boleto->setNombreComprador($nombreComprador);

            // Insertar el boleto en la base de datos
            if ($this->boletoDAO->insertarBoleto($boleto)) {
                header('Location: index.php?action=home');
                exit();
            } else {
                $mensaje = "Error al registrar el boleto.";
                require_once 'view/boletos/CompraBoleto.php';
            }
        } else {
            require_once 'view/boletos/CompraBoleto.php';
        }
    }
    public function mostrarBoletos() {
        // Verificar si el usuario está autenticado
        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] instanceof Usuario) {
            // Obtener el usuario de la sesión
            $usuario = $_SESSION['usuario'];
            $nombreComprador = $usuario->getNombreCompleto();
    
            $boletoDAO = new BoletoDAO();
            // Obtener boletos del comprador
            $boletos = $this->boletoDAO->obtenerBoletosPorComprador($nombreComprador);
    
            // Obtener información del usuario
            $usuarioInfo = $this->userController->obtenerInformacionUsuario($nombreComprador);
    
            // Cargar la vista de mostrar boletos
            require 'view/boletos/mostrarBoleto.php';
        } else {
            // Redirigir al login si el usuario no está autenticado
            header('Location: index.php?action=login');
            exit();
        }
    }
    public function editar($id) {
        $boletoDAO = new BoletoDAO();
        $boleto = $this->boletoDAO->obtenerBoletoPorId($id);
        if ($boleto) {
            require 'view/boletos/editarCompra.php';
        } else {
            header('Location: index.php?action=mostrarBol'); // Redirigir a la página de mostrar boletos
            exit();
        }
    }

    public function actualizarCompra() {
        if (isset($_POST['id'])) {
            // Verifica que todos los datos necesarios estén presentes
            if (isset($_POST['cantidad'], $_POST['metodo_pago'], $_POST['lugar'], $_POST['tipo_boleto'], $_POST['precio_total'], $_POST['precio_unidad'], $_POST['nombre_comprador'])) {
                // Crear y configurar el objeto Boleto
                $boleto = new Boleto();
                $boleto->setId($_POST['id']);
                $boleto->setCantidad($_POST['cantidad']);
                $boleto->setMetodoPago($_POST['metodo_pago']);
                $boleto->setLugar($_POST['lugar']);
                $boleto->setTipoBoleto($_POST['tipo_boleto']);
                $boleto->setPrecioTotal($_POST['precio_total']);
                $boleto->setPrecioUnidad($_POST['precio_unidad']);
                $boleto->setNombreComprador($_POST['nombre_comprador']);
                
                // Intentar actualizar el boleto
                $actualizado = $this->boletoDAO->actualizarBoleto($boleto);
                
                if ($actualizado) {
                    header('Location: index.php?action=mostrarBol');
                    exit();
                } else {
                    echo "No se pudo actualizar el boleto.";
                }
            } else {
                echo "Faltan datos en el formulario.";
            }
        } else {
            echo " ";
        }
    }    

    public function cancelarCompra() {
        if (isset($_GET['id'])) {
            $boletoId = $_GET['id'];
            $cancelado = $this->boletoDAO->cancelarBoleto($boletoId);

            if ($cancelado) {
                header('Location: index.php?action=mostrarBol');
                exit();
            } else {
                echo "No se pudo cancelar el boleto.";
            }
        } else {
            echo "ID de boleto no proporcionado.";
        }
    }
}
?>

