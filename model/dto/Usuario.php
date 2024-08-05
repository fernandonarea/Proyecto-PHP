<?php

class Usuario {
    private $id;
    private $nombreCompleto;
    private $correoElectronico;
    private $contrasena;
    private $rol;
    private $telefono;
    function __construct() {
        
    }

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function getNombreCompleto() {
        return $this->nombreCompleto;
    }

    public function getCorreoElectronico() {
        return $this->correoElectronico;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombreCompleto($nombreCompleto) {
        $this->nombreCompleto = $nombreCompleto;
    }

    public function setCorreoElectronico($correoElectronico) {
        $this->correoElectronico = $correoElectronico;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}
