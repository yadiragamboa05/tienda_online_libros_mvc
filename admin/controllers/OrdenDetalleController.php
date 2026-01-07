<?php
include '../models/OrdenDetalle.php';

class OrdenDetalleController {
    private $model;

    public function __construct() {
        $this->model = new OrdenDetalle();
    }

    public function listar() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10; 
        $offset = ($page - 1) * $limit;

        $result = $this->model->listar($search, $limit, $offset);
        $ordenDetalles = $result['ordenDetalles'];
        $total = $result['total'];
        $totalPages = ceil($total / $limit);

        include '../views/ordendetalles/index.php';
    }


    public function crear() {
        include '../views/ordendetalles/create.php';
    }

    public function guardar() {
        $id_orden = $_POST['id_orden'];
        $id_libro = $_POST['id_libro'];
        $cantidad = $_POST['cantidad'];

        if ($this->model->crear($id_orden, $id_libro, $cantidad)) {
            echo "<script>
                alert('Detalle de orden agregado correctamente.');
                window.location = 'OrdenDetalleController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al agregar el detalle de la orden.');
                window.location = 'OrdenDetalleController.php?opcion=crear';
            </script>";
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $ordenDetalle = $this->model->obtenerPorId($id);
        include '../views/ordendetalles/edit.php';
    }

    public function actualizar() {
        $id = $_POST['id'];
        $id_orden = $_POST['id_orden'];
        $id_libro = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];

        if ($this->model->actualizar($id, $id_orden, $id_libro, $cantidad)) {
            echo "<script>
                alert('Detalle de orden actualizado correctamente.');
                window.location = 'OrdenDetalleController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al actualizar el detalle de la orden.');
                window.location = 'OrdenDetalleController.php?opcion=editar&id=$id';
            </script>";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        if ($this->model->eliminar($id)) {
            echo "<script>
                alert('Detalle de orden eliminado correctamente.');
                window.location = 'OrdenDetalleController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al eliminar el detalle de la orden.');
                window.location = 'OrdenDetalleController.php?opcion=listar';
            </script>";
        }
    }
}

$opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'listar';
$controller = new OrdenDetalleController();

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
