<?php
class Servicio {
    private $servicio_id, $nombre_ser, $descripcion_ser, $imagen_ser, $estado_ser, $us_id;

    public function __construct() {
    }

    public function getId() {
        return $this->servicio_id;
    }

    public function getNombreSer() {
        return $this->nombre_ser;
    }

    public function getDescrSer() {
        return $this->descripcion_ser;
    }

    public function getImg() {
        return $this->imagen_ser;
    }

    public function getEstado() {
        return $this->estado_ser;
    }

    public function getUserId() {
        return $this->us_id;
    }


    public function setId($id) {
        $this->servicio_id = $id;
    }

    public function setNombreSer($nombre_ser) {
        $this->nombre_ser = $nombre_ser;
    }

    public function setDescrSer($descripcion_ser) {
        $this->descripcion_ser = $descripcion_ser;
    }

    public function setImg($imagen_ser) {
        $this->imagen_ser = $imagen_ser;
    }

    public function setEstado($estado_ser) {
        $this->estado_ser = $estado_ser;
    }

    public function setUserId($us_id) {
        $this->us_id = $us_id;
    }
}
?>
