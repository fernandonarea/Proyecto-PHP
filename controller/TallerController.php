<?php
require_once 'model/dao/TallerDAO.php';
require_once 'model/dto/Taller.php';

class TallerController {
    private $tallerDAO;

    public function __construct() {
        $this->tallerDAO = new TallerDAO();
    }
    public function registerTal() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $tipoTaller = $_POST['tipoTaller'];
            $experiencia = $_POST['experiencia'];
            $edad = $_POST['edad'];
            $genero = $_POST['genero'];
            $horarios = $_POST['horarios'];
    
            // Crear un objeto Taller
            $taller = new Taller();
            $taller->setNombre($nombre);
            $taller->setTipoTaller($tipoTaller);
            $taller->setExperiencia($experiencia);
            $taller->setEdad($edad);
            $taller->setGenero($genero);
            $taller->setHorarios($horarios);
    
            // Insertar el taller en la base de datos
            if ($this->tallerDAO->insertarTaller($taller)) {
                header('Location: index.php?action=home');
                exit();
            } else {
                $mensaje = "Error al registrar el taller.";
                require_once 'view/taller/registroTaller.php';
            }
        } else {
            require_once 'view/taller/registroTaller.php';
        }
    }
    public function mostrarTalleres() {
        // Verificar si el usuario está autenticado
        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] instanceof Usuario) {
            // Obtener el usuario de la sesión
            $usuario = $_SESSION['usuario'];
            $nombre = $usuario->getNombreCompleto();
    
            $tallerDAO = new TallerDAO();
            // Obtener talleres del usuario
            $talleres = $this->tallerDAO->obtenerTalleresPorNombre($nombre);

            require 'view/taller/mostrarTaller.php';
        } else {
            header('Location: index.php?action=login');
            exit();
        }
    }
    public function editarTaller($id) {
        $tallerDAO = new TallerDAO();
        $taller = $this->tallerDAO->obtenerTallerPorId($id);
        if ($taller) {
            require 'view/taller/editarTaller.php';
        } else {
            header('Location: index.php?action=mostrarTal'); // Redirigir a la página de mostrar talleres
            exit();
        }
    }
    public function actualizarTaller() {
        if (isset($_POST['id'])) {
            if (isset($_POST['nombre'], $_POST['tipo_taller'], $_POST['experiencia'], $_POST['edad'], $_POST['genero'], $_POST['horarios'])) {
               
                $taller = new Taller();
                $taller->setId($_POST['id']);
                $taller->setNombre($_POST['nombre']);
                $taller->setTipoTaller($_POST['tipo_taller']);
                $taller->setExperiencia($_POST['experiencia']);
                $taller->setEdad($_POST['edad']);
                $taller->setGenero($_POST['genero']);
                $taller->setHorarios($_POST['horarios']);
                
                // Intentar actualizar el taller
                $actualizado = $this->tallerDAO->actualizarTaller($taller);
                
                if ($actualizado) {
                    header('Location: index.php?action=mostrarTal');
                    exit();
                } else {
                    echo "No se pudo actualizar el taller.";
                }
            } else {
                echo "Faltan datos en el formulario.";
            }
        } else {
            echo "ID de taller no proporcionado.";
        }
    }

    public function cancelarTaller() {
        if (isset($_GET['id'])) {
            $tallerId = $_GET['id'];
            $cancelado = $this->tallerDAO->cancelarTaller($tallerId);
    
            if ($cancelado) {
                header('Location: index.php?action=mostrarTal');
                exit();
            } else {
                echo "No se pudo cancelar el taller.";
            }
        } else {
            echo "ID de taller no proporcionado.";
        }
    }    

}