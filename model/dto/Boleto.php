<?php
class Boleto {
    private $id;
    private $cantidad;
    private $metodoPago;
    private $lugar;
    private $tipoBoleto;
    private $precioTotal;
    private $precioUnidad;
    private $nombreComprador;

    public function __construct() {
        // Constructor vacío
    }

    public function getTipoBoleto(){
        return $this->tipoBoleto;
    }
    public function setTipoBoleto($tipoBoleto) {
        $this->tipoBoleto = $tipoBoleto;
    }
    // Getters
    public function getId() {
        return $this->id;
    }
    
    public function getCantidad() {
        return $this->cantidad;
    }
    
    public function getMetodoPago() {
        $metodo= $this->metodoPago;
        switch ($metodo) {
            case 'E':
                return 'Efectivo';
            case 'P':
                return 'Paypal';
            case 'T':
                return 'Tarjeta de Crédito';
            default:
                return 'Método de pago desconocido';
        }
    }
    
    public function getLugar() {
        return $this->lugar;
    }
    
    public function getPrecioTotal() {
        return $this->precioTotal;
    }
    
    public function getPrecioUnidad() {
        return $this->precioUnidad;
    }
    
    public function getNombreComprador() {
        return $this->nombreComprador;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
    public function setMetodoPago($metodoPago) {
        $this->metodoPago = $metodoPago;
    }
    
    public function setLugar($lugar) {
        $this->lugar = $lugar;
    }
    
    public function setPrecioTotal($precioTotal) {
        $this->precioTotal = $precioTotal;
    }
    
    public function setPrecioUnidad($precioUnidad) {
        $this->precioUnidad = $precioUnidad;
    }
    
    public function setNombreComprador($nombreComprador) {
        $this->nombreComprador = $nombreComprador;
    }
}
?>

