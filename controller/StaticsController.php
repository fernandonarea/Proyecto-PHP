<?php
class StaticsController {

    public function __construct() {
    }
    public function MainHome(){
        require_once 'view/statics/home.php';
    }
    public function AcercaDe(){
        require_once 'view/statics/acerca-de.php';
    }
    public function Experiencia(){
        require_once 'view/statics/experiencia.php';
    }
    public function Programacion(){
        require_once 'view/statics/programacion.php';
    }
    public function Servicios(){
        require_once 'view/statics/servicios.php';
    }
}