<?php

require_once 'config/Conexion.php';

class TallerDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function insertarTaller($taller) {
        try {
            $sql = "INSERT INTO talleres (nombre, tipo_taller, experiencia, edad, genero, horarios) 
                    VALUES (:nombre, :tipoTaller, :experiencia, :edad, :genero, :horarios)";
            $stmt = $this->con->prepare($sql);
            $data = array(
                'nombre' => $taller->getNombre(),
                'tipoTaller' => $taller->getTipoTaller(),
                'experiencia' => $taller->getExperiencia(),
                'edad' => $taller->getEdad(),
                'genero' => $taller->getGenero(),
                'horarios' => $taller->getHorarios()
            );
            $stmt->execute($data);
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function obtenerTallerPorId($id) {
        try {
            $query = "SELECT * FROM talleres WHERE id = :id";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                $taller = new Taller();
                $taller->setId($result['id']);
                $taller->setNombre($result['nombre']);
                $taller->setTipoTaller($result['tipo_taller']);
                $taller->setExperiencia($result['experiencia']);
                $taller->setEdad($result['edad']);
                $taller->setGenero($result['genero']);
                $taller->setHorarios($result['horarios']);
                return $taller;
            } else {
                return null; // No se encontró el taller
            }
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return null;
        }
    }
    public function actualizarTaller($taller) {
        try {
            $query = "UPDATE talleres SET
                        nombre = :nombre,
                        tipo_taller = :tipo_taller,
                        experiencia = :experiencia,
                        edad = :edad,
                        genero = :genero,
                        horarios = :horarios
                      WHERE id = :id";
            $stmt = $this->con->prepare($query);
            
            $data = array(
                'nombre' => $taller->getNombre(),
                'tipo_taller' => $taller->getTipoTaller(),
                'experiencia' => $taller->getExperiencia(),
                'edad' => $taller->getEdad(),
                'genero' => $taller->getGenero(),
                'horarios' => $taller->getHorarios(),
                'id' => $taller->getId()
            );
            return $stmt->execute($data);
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }
    public function obtenerTalleresPorNombre($nombre) {
        try {
            $query = "SELECT * FROM talleres WHERE nombre = :nombre";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $talleres = [];
            foreach ($results as $result) {
                $taller = new Taller();
                $taller->setId($result['id']);
                $taller->setNombre($result['nombre']);
                $taller->setTipoTaller($result['tipo_taller']);
                $taller->setExperiencia($result['experiencia']);
                $taller->setEdad($result['edad']);
                $taller->setGenero($result['genero']);
                $taller->setHorarios($result['horarios']);
                $talleres[] = $taller;
            }
            return $talleres;
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }
    
    public function cancelarTaller($id) {
        try {
            $query = "DELETE FROM talleres WHERE id = :id";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }
    
}