<?php
class Taller {
    private $id;
    private $nombre;
    private $tipoTaller;
    private $experiencia;
    private $edad;
    private $genero;
    private $horarios;

    public function __construct() {
        // Constructor vacío
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTipoTaller() {
        return $this->tipoTaller;
    }

    public function getExperiencia() {
        return $this->experiencia;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getHorarios() {
        return $this->horarios;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setTipoTaller($tipoTaller) {
        $this->tipoTaller = $tipoTaller;
    }

    public function setExperiencia($experiencia) {
        $this->experiencia = $experiencia;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setHorarios($horarios) {
        $this->horarios = $horarios;
    }
}

?>