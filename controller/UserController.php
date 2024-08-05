<?php
session_start();
require_once 'model/dao/UsuarioDAO.php';
require_once 'model/dto/Usuario.php';

require_once 'controller/BoletoController.php';

class UserController {
    private $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function registerUs() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombreCompleto = $_POST['nombre_completo'];
            $email = $_POST['correo_electronico'];
            $password = $_POST['contrasena'];
            $rol = $_POST['rol'];
            $telefono = $_POST['telefono'];
    
            // Crear un objeto Usuario
            $usuario = new Usuario();
            $usuario->setNombreCompleto($nombreCompleto);
            $usuario->setCorreoElectronico($email);
            $usuario->setContrasena($password); // Guardar contraseña en texto plano
            $usuario->setRol($rol);
            $usuario->setTelefono($telefono);
    
            // Insertar el usuario en la base de datos
            if ($this->usuarioDAO->insertarUsuario($usuario)) {
                header('Location: index.php?action=login');
                exit();
            } else {
                $mensaje = "Error al registrar el usuario.";
                require_once 'view/usuarios/register.php';
            }
        } else {
            require_once 'view/usuarios/register.php';
        }
    }
    
   public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            if (empty($email) || empty($password)) {
                echo 'Correo electrónico o contraseña no proporcionados.';
                return;
            }

            $usuario = $this->usuarioDAO->selectByEmail($email,$password);

            if ($usuario && $usuario->getContrasena() === $password) { // Comparar contraseñas en texto plano
                $_SESSION['usuario'] = $usuario;
                $rolUser = strtolower(trim($usuario->getRol()));
                if ($rolUser === 'gerente') {
                    header('Location: index.php?action=gerente');
                } else {
                    header('Location: index.php?action=home');
                }
                exit();
            } else {
                echo 'Correo electrónico o contraseña incorrectos.';
            }
        } else {
            require_once 'view/usuarios/login.php'; // Mostrar el formulario de inicio de sesión
        }
    }
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }

    public function menuComprador() {
        // Verificar si el usuario está autenticado
        if (isset($_SESSION['usuario'])) { 
            $usuario = $_SESSION['usuario'];
            $rolUser = strtolower(trim($usuario->getRol()));
            if($rolUser==="comprador"||$rolUser="patrocinador"){
                require_once 'view/statics/menuComprador.php';
            }else 
            header('Location: index.php?action=login');
        } else {
            header('Location: index.php?action=login');
            exit();
        }
    }

    public function menuGerente() {
        // Verificar si el usuario está autenticado
        if (isset($_SESSION['usuario'])) { 

            $usuario = $_SESSION['usuario'];
            $rolUser = strtolower(trim($usuario->getRol()));
            if($rolUser==="gerente"){
                require_once 'view/statics/menuGerente.php';
            }else 
            header('Location: index.php?action=login');
        } else {
            header('Location: index.php?action=login');
            exit();
        }
    }

    public function EditUs() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtenemos el ID del usuario que se está editando
            $id = $_POST['id'];
            
            // Recogemos los datos enviados por el formulario
            $nombreCompleto = $_POST['nombre_completo'];
            $email = $_POST['correo_electronico'];
            $contrasena = $_POST['contrasena'];
            $rol = $_POST['rol'];
            $telefono = $_POST['telefono'];
    
            // Obtenemos el usuario existente de la base de datos
            $usuario = $this->usuarioDAO->obtenerUsuarioPorId($id);
    
            if ($usuario) {
                // Actualizamos los datos del objeto Usuario
                $usuario->setNombreCompleto($nombreCompleto);
                $usuario->setCorreoElectronico($email);
                $usuario->setContrasena($contrasena); // 
                $usuario->setRol($rol);
                $usuario->setTelefono($telefono);
    
                // Guardamos los cambios en la base de datos
                if ($this->usuarioDAO->actualizarUsuario($usuario)) {
                    header('Location: index.php?action=menuGerente&id=' . $id); 
                    exit();
                } else {
                    $mensaje = "Error al modificar el usuario.";
                    require_once 'view/usuarios/editarusuarios.php';
                }
            } else {
                $mensaje = "Usuario no encontrado.";
                require_once 'view/usuarios/editarusuarios.php';
            }
        } else { 
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $usuario = $this->usuarioDAO->obtenerUsuarioPorId($id);
                include 'view/usuarios/editarusuarios.php';
    
                if ($usuario) {
                    require_once 'view/usuarios/editarusuarios.php'; // Mostrar formulario de edición con datos actuales
                } else {
                    $mensaje = "Usuario no encontrado.";
                    require_once 'view/usuarios/editarusuarios.php';
                }
            } else {
                $mensaje = "ID no proporcionado.";
                require_once 'view/usuarios/editarusuarios.php';
            }
        }
    }

    public function ElimUs() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener el ID del usuario a eliminar
            $id = $_POST['id'];
    
            if (empty($id)) {
                $mensaje = "ID no proporcionado.";
                require_once 'view/statics/menuGerente.php'; // Ajusta la vista según sea necesario
                return;
            }
    
            // Intentar eliminar el usuario
            if ($this->usuarioDAO->eliminarUsuario($id)) {
                // Redirigir después de eliminar con éxito
                header('Location: index.php?action=menuGerente'); 
                exit();
            } else {
                $mensaje = "Error al eliminar el usuario.";
                require_once 'view/statics/menuGerente.php';
            }
        } else {
            $mensaje = "Método de solicitud no permitido.";
            require_once 'view/statics/menuGerente.php'; 
            
        }
    }

    public function obtenerInformacionUsuario($nombreCompleto) {
        $usuario = $this->usuarioDAO->obtenerUsuarioPorNombre($nombreCompleto);
        
        if ($usuario) {
            return array(
                'id' => $usuario->getId(),
                'nombre' => $usuario->getNombreCompleto(),
                'email' => $usuario->getCorreoElectronico(),
                'rol' => $usuario->getRol(),
                'telefono' => $usuario->getTelefono()
            );
        } else {
            return null;
        }
    }
    
}

