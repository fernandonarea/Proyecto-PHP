<?php
class Hotel {
    private $id;
    private $total_habitaciones;
    private $tipo_hotel;
    private $nombre_hotel;
    private $dias_hospedaje;
    private $total_personas;
    private $nombre_reserva;

    // Constructor vacío
    public function __construct() {}

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTotalHabitaciones() {
        return $this->total_habitaciones;
    }

    public function setTotalHabitaciones($total_habitaciones) {
        $this->total_habitaciones = $total_habitaciones;
    }

    public function getTipoHotel() {
        return $this->tipo_hotel;
    }

    public function setTipoHotel($tipo_hotel) {
        $this->tipo_hotel = $tipo_hotel;
    }

    public function getNombreHotel() {
        return $this->nombre_hotel;
    }

    public function setNombreHotel($nombre_hotel) {
        $this->nombre_hotel = $nombre_hotel;
    }

    public function getDiasHospedaje() {
        return $this->dias_hospedaje;
    }

    public function setDiasHospedaje($dias_hospedaje) {
        $this->dias_hospedaje = $dias_hospedaje;
    }

    public function getTotalPersonas() {
        return $this->total_personas;
    }

    public function setTotalPersonas($total_personas) {
        $this->total_personas = $total_personas;
    }

    public function getNombreReserva() {
        return $this->nombre_reserva;
    }

    public function setNombreReserva($nombre_reserva) {
        $this->nombre_reserva = $nombre_reserva;
    }
}
?>
