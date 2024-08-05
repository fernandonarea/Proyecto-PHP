<?php
require_once 'UserController.php';
require_once 'BoletoController.php';
require_once 'HotelController.php';
require_once 'TallerController.php';
require_once 'ServicioController.php';
require_once 'StaticsController.php';

class IndexController {

    private $userController;
    private $boletoController;
    private $hotelController;
    private $tallerController;
    private $servicioController;
    private $staticsController;

    public function __construct() {
        $this->userController = new UserController();
        $this->boletoController = new BoletoController();
        $this->hotelController = new HotelController();
        $this->tallerController = new TallerController();
        $this->servicioController = new ServicioController();
        $this->staticsController = new StaticsController();
    }

    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'login';
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        switch ($action) {
            //OPCIONES USUARIO
            case 'login':
                $this->userController->login();
                break;
            case 'logout':
                    $this->userController->logout();
                    break;
            case 'home':
                $this->userController->menuComprador();
                break;
            case 'gerente':
                $this->userController->menuGerente();
                break;
            case 'registerUs':
                $this->userController->registerUs();
                break;
            case 'EditUs':
                $this->userController->EditUs();
                break;
            case 'ElimUs':
                $this->userController->ElimUs();
                break;
            //CRUD BOLETOS
            case 'registerBol':
                $this->boletoController->registerBol();
                break;
            case 'mostrarBol':
                $this->boletoController->mostrarBoletos();
                break;
            case 'editarBol'://es llamado para obtener los datos de id 
                if ($id) {
                    $this->boletoController->editar($id); 
                } else {
                    echo "ID de boleto no proporcionado.";
                }
            case 'actualizarCompra'://es llamado para el guardado de los datos q obtivimos con el metod de arriba 
                $this->boletoController->actualizarCompra();
                break;
            case 'cancelarCompra':
                $this->boletoController->cancelarCompra();
                break;
            //CRUD HOTEL
            case 'registerHot':
                $this->hotelController->registerHotel();
                break;
            case 'mostrarHot':
                $this->hotelController->mostrarHoteles();
                break;
            case 'editarHot':
                if ($id) {
                    $this->hotelController->editarHotel($id); 
                } else {
                    echo "ID de Hotel no proporcionado.";
                }
                break;
            case 'actualizarHot':
                    $this->hotelController->actualizarHotel();
                    break;
            case 'cancelarHot':
                $this->hotelController->cancelarReserva();
                break;
            //CRUD TALLER
            case 'registerTal':
                $this->tallerController->registerTal();
                break;
            case 'mostrarTal':
                $this->tallerController->mostrarTalleres();
                break;
            case 'editarTal':
                if ($id) {
                    $this->tallerController->editarTaller($id); 
                } else {
                    echo "ID de Taller no proporcionado.";
                }
                break;
            case 'actualizarTal':
                $this->tallerController->actualizarTaller();
                break;
            case 'cancelarTal':
                $this->tallerController->cancelarTaller();
                break;
            //CRUD SERVICIOS
            case 'registerServicio':
                $this->servicioController->registerServicio();
                break;
            case 'nuevoServicio':
                $this->servicioController->nuevoServicio();
                break;
            case 'indexServicios':
                $this->servicioController->indexServicios();
                break;
            case 'view_editS':
                $this->servicioController->view_editS();
                break;
            case 'deleteServicio':
                $this->servicioController->deleteServicioC();
                break;
            case 'buscarServicio':
                $this->servicioController->buscarServicio($_POST['b']);
                break;
            //statics
            case 'MainHome':
                $this->staticsController->MainHome(); 
                break;
            case 'AcercaDe':
                $this->staticsController->AcercaDe(); 
                break; 
            case 'Experiencia':
                $this->staticsController->Experiencia(); 
                break;
            case 'Programacion':
                $this->staticsController->Programacion(); 
                break; 
            case 'Servicios':
                $this->staticsController->Servicios(); 
                break;  
            default:
                $this->staticsController->MainHome(); 
                break;
        }
    }
}

