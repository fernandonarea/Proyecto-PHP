<?php
require_once 'config/Conexion.php';

class HotelDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function insertarHotel($hotel) {
        try {
            $sql = "INSERT INTO hotel (total_habitaciones, tipo_hotel, nombre_hotel, dias_hospedaje, total_personas, nombre_reserva) 
                    VALUES (:total_habitaciones, :tipo_hotel, :nombre_hotel, :dias_hospedaje, :total_personas, :nombre_reserva)";
            $stmt = $this->con->prepare($sql);
            $data = array(
                'total_habitaciones' => $hotel->getTotalHabitaciones(),
                'tipo_hotel' => $hotel->getTipoHotel(),
                'nombre_hotel' => $hotel->getNombreHotel(),
                'dias_hospedaje' => $hotel->getDiasHospedaje(),
                'total_personas' => $hotel->getTotalPersonas(),
                'nombre_reserva' => $hotel->getNombreReserva()
            );
            $stmt->execute($data);
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function obtenerHotelPorNombre($nombreReserva) {
        try {
            $query = "SELECT * FROM hotel WHERE nombre_reserva = :nombreReserva";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':nombreReserva', $nombreReserva, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $hoteles = [];
            foreach ($results as $result) {
                $hotel = new Hotel();
                $hotel->setId($result['id']);
                $hotel->setTotalHabitaciones($result['total_habitaciones']);
                $hotel->setTipoHotel($result['tipo_hotel']);
                $hotel->setNombreHotel($result['nombre_hotel']);
                $hotel->setDiasHospedaje($result['dias_hospedaje']);
                $hotel->setTotalPersonas($result['total_personas']);
                $hotel->setNombreReserva($result['nombre_reserva']);
                $hoteles[] = $hotel;
            }
            return $hoteles;
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }
    
    public function obtenerHotelPorId($id) {
        try {
            $query = "SELECT * FROM hotel WHERE id = :id";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                $hotel = new Hotel();
                $hotel->setId($result['id']);
                $hotel->setTotalHabitaciones($result['total_habitaciones']);
                $hotel->setTipoHotel($result['tipo_hotel']);
                $hotel->setNombreHotel($result['nombre_hotel']);
                $hotel->setDiasHospedaje($result['dias_hospedaje']);
                $hotel->setTotalPersonas($result['total_personas']);
                $hotel->setNombreReserva($result['nombre_reserva']);
                return $hotel;
            } else {
                return null; // No se encontró el hotel
            }
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return null;
        }
    }

    public function actualizarHotel($hotel) {
        try {
            $query = "UPDATE hotel SET
                        total_habitaciones = :total_habitaciones,
                        tipo_hotel = :tipo_hotel,
                        nombre_hotel = :nombre_hotel,
                        dias_hospedaje = :dias_hospedaje,
                        total_personas = :total_personas,
                        nombre_reserva = :nombre_reserva
                      WHERE id = :id";
            $stmt = $this->con->prepare($query);
           
            // Suponiendo que $hotel es un objeto con los datos actualizados
            $data = array(
                'total_habitaciones' => $hotel->getTotalHabitaciones(),
                'tipo_hotel' => $hotel->getTipoHotel(),
                'nombre_hotel' => $hotel->getNombreHotel(),
                'dias_hospedaje' => $hotel->getDiasHospedaje(),
                'total_personas' => $hotel->getTotalPersonas(),
                'nombre_reserva' => $hotel->getNombreReserva(),
                'id' => $hotel->getId()
            );
            return $stmt->execute($data);
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }

    public function cancelarHotel($id) {
        try {
            $query = "DELETE FROM hotel WHERE id = :id";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }
}