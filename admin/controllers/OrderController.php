<?php
include '../models/Order.php';

class OrderController {
    private $model;

    public function __construct() {
        $this->model = new Order();
    }

    public function listar() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10; // Número de resultados por página
        $offset = ($page - 1) * $limit;

        $result = $this->model->listar($search, $limit, $offset);
        $ordenes = $result['ordenes'];
        $total = $result['total'];
        $totalPages = ceil($total / $limit);

        include '../views/orders/index.php';
    }


    public function crear() {
        include '../views/orders/create.php';
    }

    public function guardar() {
        $id_cliente = $_POST['id_cliente'];
        $id_empleado = $_POST['id_empleado'];
        $fecha_orden = $_POST['fecha_orden'];
        $id_conductor = $_POST['id_conductor'];

        if ($this->model->crear($id_cliente, $id_empleado, $fecha_orden, $id_conductor)) {
            echo "<script>
                alert('Orden agregada correctamente.');
                window.location = 'OrderController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al agregar la orden.');
                window.location = 'OrderController.php?opcion=crear';
            </script>";
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $orden = $this->model->obtenerPorId($id);
        include '../views/orders/edit.php';
    }

    public function actualizar() {
        $id = $_POST['id'];
        $id_cliente = $_POST['id_cliente'];
        $id_empleado = $_POST['id_empleado'];
        $fecha_orden = $_POST['fecha_orden'];
        $id_conductor = $_POST['id_conductor'];

        if ($this->model->actualizar($id, $id_cliente, $id_empleado, $fecha_orden, $id_conductor)) {
            echo "<script>
                alert('Orden actualizada correctamente.');
                window.location = 'OrderController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al actualizar la orden.');
                window.location = 'OrderController.php?opcion=editar&id=$id';
            </script>";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        if ($this->model->eliminar($id)) {
            echo "<script>
                alert('Orden eliminada correctamente.');
                window.location = 'OrderController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al eliminar la orden.');
                window.location = 'OrderController.php?opcion=listar';
            </script>";
        }
    }
}

$opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'listar';
$controller = new OrderController();

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
