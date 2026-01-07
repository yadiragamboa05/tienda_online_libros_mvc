<?php
include '../models/Proveedor.php';

class ProveedorController {
    private $model;

    public function __construct() {
        $this->model = new Proveedor();
    }

    public function listar() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10; // Número de resultados por página
        $offset = ($page - 1) * $limit;

        $result = $this->model->listar($search, $limit, $offset);
        $proveedores = $result['proveedores'];
        $total = $result['total'];
        $totalPages = ceil($total / $limit);

        include '../views/proveedores/index.php';
    }


    public function crear() {
        include '../views/proveedores/create.php';
    }

    public function guardar() {
        $nombre = $_POST['nombre'];
        $contacto = $_POST['contacto'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $codigo_postal = $_POST['codigo_postal'];
        $pais = $_POST['pais'];
        $celular = $_POST['celular'];

        if ($this->model->crear($nombre, $contacto, $direccion, $ciudad, $codigo_postal, $pais, $celular)) {
            echo "<script>
                alert('Proveedor agregado correctamente.');
                window.location = 'ProveedorController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al agregar el proveedor.');
                window.location = 'ProveedorController.php?opcion=crear';
            </script>";
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $proveedor = $this->model->obtenerPorId($id);
        include '../views/proveedores/edit.php';
    }

    public function actualizar() {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $contacto = $_POST['contacto'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $codigo_postal = $_POST['codigo_postal'];
        $pais = $_POST['pais'];
        $celular = $_POST['celular'];

        if ($this->model->actualizar($id, $nombre, $contacto, $direccion, $ciudad, $codigo_postal, $pais, $celular)) {
            echo "<script>
                alert('Proveedor actualizado correctamente.');
                window.location = 'ProveedorController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al actualizar el proveedor.');
                window.location = 'ProveedorController.php?opcion=editar&id=$id';
            </script>";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        if ($this->model->eliminar($id)) {
            echo "<script>
                alert('Proveedor eliminado correctamente.');
                window.location = 'ProveedorController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al eliminar el proveedor.');
                window.location = 'ProveedorController.php?opcion=listar';
            </script>";
        }
    }
}

$opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'listar';
$controller = new ProveedorController();

switch ($opcion) {
    case 'listar':
        $controller->listar();
        break;
    case 'crear':
        $controller->crear();
        break;
    case 'guardar':
        $controller->guardar();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'actualizar':
        $controller->actualizar();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    default:
        $controller->listar();
        break;
}
?>
