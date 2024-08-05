<?php
require_once 'config/Conexion.php';

class BoletoDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }
    

    public function insertarBoleto($boleto) {
        try {
            $sql = "INSERT INTO boletos (bol_cantidad, bol_metodo_pago, bol_lugar, bol_tipoBoleto, bol_precioTotal, bol_precioUnidad, bol_Ncomprador) 
                    VALUES (:cantidad, :metodoPago, :lugar, :tipoBoleto, :precioTotal, :precioUnidad, :nombreComprador)";
            $stmt = $this->con->prepare($sql);
            $data = array(
                'cantidad' => $boleto->getCantidad(),
                'metodoPago' => $boleto->getMetodoPago(),
                'lugar' => $boleto->getLugar(),
                'tipoBoleto' => $boleto->getTipoBoleto(),
                'precioTotal' => $boleto->getPrecioTotal(),
                'precioUnidad' => $boleto->getPrecioUnidad(),
                'nombreComprador' => $boleto->getNombreComprador()
            );
            $stmt->execute($data);
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function obtenerBoletoPorId($id) {
        try {
            $query = "SELECT * FROM boletos WHERE bol_id = :id";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $boleto = new Boleto();
                $boleto->setId($result['bol_id']);
                $boleto->setCantidad($result['bol_cantidad']);
                $boleto->setMetodoPago($result['bol_metodo_pago']);
                $boleto->setLugar($result['bol_lugar']);
                $boleto->setTipoBoleto($result['bol_tipoBoleto']);
                $boleto->setPrecioTotal($result['bol_precioTotal']);
                $boleto->setPrecioUnidad($result['bol_precioUnidad']);
                $boleto->setNombreComprador($result['bol_Ncomprador']);
                return $boleto;
            } else {
                return null; // No se encontró el boleto
            }
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return null;
        }
    }

    public function actualizarBoleto($boleto) {
        try {
            $query = "UPDATE boletos SET
                        bol_cantidad = :cantidad,
                        bol_metodo_pago = :metodo_pago,
                        bol_lugar = :lugar,
                        bol_tipoBoleto = :tipo_boleto,
                        bol_precioTotal = :precio_total,
                        bol_precioUnidad = :precio_unidad,
                        bol_Ncomprador = :nombre_comprador
                      WHERE bol_id = :id";
            $stmt = $this->con->prepare($query);
           
            $data = array(
                'cantidad' => $boleto->getCantidad(),
                'metodo_pago' => $boleto->getMetodoPago(),
                'lugar' => $boleto->getLugar(),
                'tipo_boleto' => $boleto->getTipoBoleto(),
                'precio_total' => $boleto->getPrecioTotal(),
                'precio_unidad' => $boleto->getPrecioUnidad(),
                'nombre_comprador' => $boleto->getNombreComprador(),
                'id' => $boleto->getId()
            );
            return $stmt->execute($data);
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }

    public function cancelarBoleto($id) {
        try {
            $query = "DELETE FROM boletos WHERE bol_id = :id";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerBoletosPorComprador($nombreCompleto) {
        try {
            $query = "SELECT * FROM boletos WHERE bol_Ncomprador = :nombreCompleto";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':nombreCompleto', $nombreCompleto, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $boletos = [];
            foreach ($results as $result) {
                $boleto = new Boleto();
                $boleto->setId($result['bol_id']);
                $boleto->setCantidad($result['bol_cantidad']);
                $boleto->setMetodoPago($result['bol_metodo_pago']);
                $boleto->setLugar($result['bol_lugar']);
                $boleto->setTipoBoleto($result['bol_tipoBoleto']);
                $boleto->setPrecioTotal($result['bol_precioTotal']);
                $boleto->setPrecioUnidad($result['bol_precioUnidad']);
                $boleto->setNombreComprador($result['bol_Ncomprador']);
                $boletos[] = $boleto;
            }
            return $boletos;
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return [];
        }
    }
}
?>

