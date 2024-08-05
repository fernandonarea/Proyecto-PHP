<?php
require_once 'config/Conexion.php';

class UsuarioDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function insertarUsuario($usuario) {
        try {
            $sql = "INSERT INTO usuarios (us_nombre_completo, us_correo_electronico, us_contrasena, us_rol, us_telefono) 
                    VALUES (:nombre_completo, :correo_electronico, :contrasena, :rol, :telefono)";
            $stmt = $this->con->prepare($sql);
            $data = array(
                'nombre_completo' => $usuario->getNombreCompleto(),
                'correo_electronico' => $usuario->getCorreoElectronico(),
                'contrasena' => $usuario->getContrasena(),
                'rol' => $usuario->getRol(),
                'telefono' => $usuario->getTelefono()
            );
            $stmt->execute($data);
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    //para validacion de login
    public function selectByEmail($email,$contrasena) {
        try {
            $query = "SELECT * FROM usuarios WHERE us_correo_electronico = :email AND us_contrasena = :contrasena";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                // Crear una instancia de Usuario y asignar los datos
                $usuario = new Usuario();
                $usuario->setId($result['us_id']);
                $usuario->setNombreCompleto($result['us_nombre_completo']);
                $usuario->setCorreoElectronico($result['us_correo_electronico']);
                $usuario->setContrasena($result['us_contrasena']);
                $usuario->setRol($result['us_rol']);
                $usuario->setTelefono($result['us_telefono']);
                
                return $usuario;
            } else {
                return null; // No se encontró el usuario
            }
        } catch (Exception $e) {
            // Manejar errores de consulta
            echo "Error en la consulta: " . $e->getMessage();
            return null;
        }
    }
    //traee datos usuario por nombre
    public function obtenerUsuarioPorNombre($nombreCompleto) {
        try {
            $query = "SELECT * FROM usuarios WHERE us_nombre_completo = :nombreCompleto";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':nombreCompleto', $nombreCompleto, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                // Crear una instancia de Usuario y asignar los datos
                $usuario = new Usuario();
                $usuario->setId($result['us_id']);
                $usuario->setNombreCompleto($result['us_nombre_completo']);
                $usuario->setCorreoElectronico($result['us_correo_electronico']);
                $usuario->setContrasena($result['us_contrasena']);
                $usuario->setRol($result['us_rol']);
                $usuario->setTelefono($result['us_telefono']);
                
                return $usuario;
            } else {
                return null; // No se encontró el usuario
            }
        } catch (Exception $e) {
            // Manejar errores de consulta
            echo "Error en la consulta: " . $e->getMessage();
            return null;
        }
    }
    public function actualizarUsuario($usuario) {
        try {
            $sql = "UPDATE usuarios SET us_nombre_completo = :nombre_completo, us_correo_electronico = :correo_electronico, us_telefono = :telefono WHERE us_id = :id";
            $stmt = $this->con->prepare($sql);
            $data = array(
                'nombre_completo' => $usuario->getNombreCompleto(),
                'correo_electronico' => $usuario->getCorreoElectronico(),
                'telefono' => $usuario->getTelefono(),
                'id' => $usuario->getId()
            );
            $stmt->execute($data);
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function obtenerdatosdeUsuario($id,$nombre,$correo,$contrasena,$rol,$telefono) {
        $query = 'SELECT * FROM usuarios WHERE us_id = :id AND us_nombre_completo = :nombre AND us_correoelectronico = :correo AND us_contrasena = :n AND us_rol = :rol AND us_telefono = :telefono';
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->execute();
        
        // Obtener los resultados
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retornar los resultados
        return $resultado;
    }

    public function obtenerUsuarioPorId($id) {
        $conn = Conexion::getConexion();
        $query = 'SELECT * FROM usuarios WHERE us_id = :id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id,PDO::PARAM_INT);
        $stmt->execute();

        $usuario = $stmt->fetchObject('Usuario');
        return $usuario ? $usuario : null;
    }

    public function eliminarUsuario($id) {
    $sql = "DELETE FROM usuarios WHERE us_id = :id"; 
    $stmt = $this->con->prepare($sql); 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
    }
}


