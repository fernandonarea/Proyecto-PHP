<?php 
require_once 'model/dto/Servicio.php';
require_once 'model/dao/ServicioDAO.php';

class ServicioController {
    private $servicioDAO;

    public function __construct() {
        $this->servicioDAO = new ServicioDAO();
    }

    public function indexServicios() {
        $resultados = $this->servicioDAO->selectAll("");
        $titulo = 'Servicios Disponibles';
        require_once VSERVICIOS.'list.php';
    }

    public function registerServicio() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre_ser'];
            $descr = $_POST['descripcion_ser'];
            $estado = isset($_POST['estado_ser']) ? 1 : 0;
            $us_id = $_POST['us_id'];


            if (isset($_FILES['imagen_ser']) && $_FILES['imagen_ser']['error'] === UPLOAD_ERR_OK) {
                $img = basename($_FILES['imagen_ser']['name']);
                $imgTmp = $_FILES['imagen_ser']['tmp_name'];
                $imgDir = 'assets/imagenes/' . $img;


                if (!move_uploaded_file($imgTmp, $imgDir)) {
                    $mensaje = 'Error al subir la imagen';
                    $titulo = 'Nuevo Servicio';
                    require_once VSERVICIOS.'new.php';
                    return;
                }
            } else {
                $img = null;
            }

            $servicio = new Servicio();
            $servicio->setNombreSer(htmlentities($nombre));
            $servicio->setDescrSer(htmlentities($descr));
            $servicio->setImg(htmlentities($img));
            $servicio->setEstado(htmlentities($estado));
            $servicio->setUserId(htmlentities($us_id));
            
            if ($this->servicioDAO->insertarServicio($servicio)) {
                header('Location: index.php?action=indexServicios');
                exit();
            } else {
                $mensaje = 'Error al ingresar un nuevo Servicio';
                $titulo = 'Nuevo Servicio';
                require_once VSERVICIOS.'new.php';
            }
        } else {
            $titulo = 'Servicios Disponibles';
            $resultados = [];
            require_once VSERVICIOS.'list.php';
        }
    }

    public function buscarServicio($parametro) {
        $parametro = (!empty($_POST["b"])) ? htmlentities($_POST["b"]) : "";
        $resultados = $this->servicioDAO->selectAll($parametro);
        $titulo = 'Buscar Servicios';
        require_once VSERVICIOS.'list.php';
    }

    public function nuevoServicio() {
        $titulo = 'Nuevo Servicio';
        require_once VSERVICIOS.'new.php';
    }
    
    public function view_editS() {
        if (isset($_GET['servicio_id'])) {
            $id = $_GET['servicio_id'];
            $servicio = $this->servicioDAO->selectOne($id);
            $titulo = 'Editar Servicio';
            require_once 'view/servicios/servicios.edit.php';
        } else {
            echo 'ID del servicio no proporcionado';
        }
    }
    

    public function updateServicio() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['servicio_id'];
            $nombre = $_POST['nombre_ser'];
            $descripcion = $_POST['descripcion_ser'];
            $estado = isset($_POST['estado_ser']) ? 1 : 0;
    

            if (isset($_FILES['imagen_ser']) && $_FILES['imagen_ser']['error'] === UPLOAD_ERR_OK) {
                $img = basename($_FILES['imagen_ser']['name']);
                $imgTmp = $_FILES['imagen_ser']['tmp_name'];
                $imgDir = 'assets/imagenes/' . $img;
    

                if (!move_uploaded_file($imgTmp, $imgDir)) {
                    $mensaje = 'Error al subir la imagen';
                    $titulo = 'Editar Servicio';
                    require_once VSERVICIOS.'servicios.edit.php';
                    return;
                }
            } else {
                $img = $_POST['current_image'];
            }
    
            $servicio = new Servicio();
            $servicio->setId($id);
            $servicio->setNombreSer(htmlentities($nombre));
            $servicio->setDescrSer(htmlentities($descripcion));
            $servicio->setImg(htmlentities($img));
            $servicio->setEstado(htmlentities($estado));
    
            if ($this->servicioDAO->actualizarServicio($servicio)) {
                header('Location: index.php?action=indexServicios');
                exit();
            } else {
                $mensaje = 'Error al actualizar el servicio';
                $titulo = 'Editar Servicio';
                require_once VSERVICIOS.'servicios.edit.php';
            }
        }
    }
    
    public function deleteServicioC() {
        if (isset($_GET['servicio_id'])) {
            $id = $_GET['servicio_id'];
            if ($this->servicioDAO->deleteServicio($id)) {
                header('Location: index.php?action=indexServicios');
                exit();
            } else {
                echo 'Error al eliminar el servicio';
            }
        } else {
            echo 'ID del servicio no proporcionado';
        }
    }    
}
?>
