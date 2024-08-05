<?php
define('BASE_URL', 'http://localhost/MVCP/');
define('CSS_PATH', BASE_URL .'assets/style/styles.css');
define('AUDIO_PATH',BASE_URL .'config/audio.php?file=');
define('IMAGE_PATH', BASE_URL .'config/image.php?file=');

define("VSERVICIOS", "view/servicios/servicios.");

//DAOS
define('DAO_PATH', BASE_URL .'model/dao/');

//DTO'S
require_once 'model/dto/Usuario.php';
require_once 'model/dto/Boleto.php';
require_once 'model/dto/Hotel.php';
require_once 'model/dto/Taller.php';
require_once 'model/dto/Servicio.php';


//CONTROLADORES
require_once 'controller/IndexController.php';
require_once 'controller/UserController.php';
require_once 'controller/BoletoController.php';
require_once 'controller/HotelController.php';
require_once 'controller/TallerController.php';
require_once 'controller/ServicioController.php';
require_once 'controller/StaticsController.php';

$indexController = new IndexController();
$indexController->handleRequest();

