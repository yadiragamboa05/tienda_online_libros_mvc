<?php
include '../models/Cliente.php';

class ClientesController {
    private $model;

    public function __construct() {
        $this->model = new Cliente();
    }

    public function listar() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $result = $this->model->listar($search, $limit, $offset);
        $clientes = $result['clientes'];
        $total = $result['total'];
        $totalPages = ceil($total / $limit);

        include '../views/clientes/index.php';
    }


    public function crear() {
        include '../views/clientes/create.php';
    }

    public function guardar() {
        $nombre_cliente = $_POST['nombre_cliente'];
        $nombre_contacto = $_POST['nombre_contacto'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $codigo_postal = $_POST['codigo_postal'];
        $pais = $_POST['pais'];

        if ($this->model->crear($nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais)) {
            echo "<script>
                alert('Cliente agregado correctamente.');
                window.location = 'ClientesController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al agregar el cliente.');
                window.location = 'ClientesController.php?opcion=crear';
            </script>";
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $cliente = $this->model->obtenerPorId($id);
        include '../views/clientes/edit.php';
    }

    public function actualizar() {
        $id = $_POST['id'];
        $nombre_cliente = $_POST['nombre_cliente'];
        $nombre_contacto = $_POST['nombre_contacto'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $codigo_postal = $_POST['codigo_postal'];
        $pais = $_POST['pais'];

        if ($this->model->actualizar($id, $nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais)) {
            echo "<script>
                alert('Cliente actualizado correctamente.');
                window.location = 'ClientesController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al actualizar el cliente.');
                window.location = 'ClientesController.php?opcion=editar&id=$id';
            </script>";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        if ($this->model->eliminar($id)) {
            echo "<script>
                alert('Cliente eliminado correctamente.');
                window.location = 'ClientesController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al eliminar el cliente.');
                window.location = 'ClientesController.php?opcion=listar';
            </script>";
        }
    }
}

$opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'listar';
$controller = new ClientesController();

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