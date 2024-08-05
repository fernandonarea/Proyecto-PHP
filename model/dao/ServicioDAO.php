<?php 
require_once 'config/Conexion.php';
require_once 'model/dto/Servicio.php';

class ServicioDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($servicio) {
        $sql = "SELECT servicio_id, nombre_ser, descripcion_ser, imagen_ser, us_id 
                FROM servicios 
                WHERE nombre_ser LIKE :b1 AND estado_ser = 1";
            
        $stmt = $this->con->prepare($sql);
    
        $conlike = '%'. $servicio . '%';
        $stmt->bindParam(':b1', $conlike, PDO::PARAM_STR);
    
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        return $resultados;
    }
    
    public function selectOne($id) {
        $sql = 'SELECT * FROM servicios WHERE servicio_id = :id';
        $stmt = $this->con->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        $servicio = $stmt->fetch(PDO::FETCH_ASSOC);

        return $servicio;
    }

    public function insertarServicio($servicio) {
        try {
            $sql = "INSERT INTO servicios (nombre_ser, descripcion_ser, imagen_ser, estado_ser, us_id)
                    VALUES (:nombre, :descri, :img, :estado, :usId)";
            
            $stmt = $this->con->prepare($sql);
            
            $data = array(
                'nombre' => $servicio->getNombreSer(),
                'descri' => $servicio->getDescrSer(),
                'img' => $servicio->getImg(),
                'estado' => $servicio->getEstado(),
                'usId' => $servicio->getUserId()
            );
    
            $stmt->execute($data);
            return $stmt->rowCount() > 0;
            
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }    
    
    public function actualizarServicio($servicio) {
        try {
            $query = "UPDATE servicios SET
                        nombre_ser = :nombre,
                        descripcion_ser = :descripcion,
                        imagen_ser = :imagen,
                        estado_ser = :estado,
                        us_id = :usId
                      WHERE servicio_id = :id";
            
            $stmt = $this->con->prepare($query);
    
            // Crear un array asociativo con los datos del servicio
            $data = array(
                'nombre' => $servicio->getNombreSer(),
                'descripcion' => $servicio->getDescrSer(),
                'imagen' => $servicio->getImg(),
                'estado' => $servicio->getEstado(),
                'usId' => $servicio->getUserId(),
                'id' => $servicio->getId()
            );
    
            // Ejecutar la consulta con los datos
            return $stmt->execute($data);
            
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }
    

    public function deleteServicio($id) {
        try {
            $sql = "DELETE FROM servicios WHERE servicio_id = :servicio_id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':servicio_id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>
