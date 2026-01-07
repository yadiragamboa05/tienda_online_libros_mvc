<?php
include '../models/Conductor.php';

class ConductoresController {
    private $model;

    public function __construct() {
        $this->model = new Conductor();
    }

    public function listar() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10; // Número de resultados por página
        $offset = ($page - 1) * $limit;

        $result = $this->model->listar($search, $limit, $offset);
        $conductores = $result['conductores'];
        $total = $result['total'];
        $totalPages = ceil($total / $limit);

        include '../views/conductores/index.php';
    }


    public function crear() {
        include '../views/conductores/create.php';
    }

    public function guardar() {
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];

        if ($this->model->crear($nombre, $celular)) {
            echo "<script>
                alert('Conductor agregado correctamente.');
                window.location = 'ConductoresController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al agregar el conductor.');
                window.location = 'ConductoresController.php?opcion=crear';
            </script>";
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $conductor = $this->model->obtenerPorId($id);
        include '../views/conductores/edit.php';
    }

    public function actualizar() {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];

        if ($this->model->actualizar($id, $nombre, $celular)) {
            echo "<script>
                alert('Conductor actualizado correctamente.');
                window.location = 'ConductoresController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al actualizar el conductor.');
                window.location = 'ConductoresController.php?opcion=editar&id=$id';
            </script>";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        if ($this->model->eliminar($id)) {
            echo "<script>
                alert('Conductor eliminado correctamente.');
                window.location = 'ConductoresController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al eliminar el conductor.');
                window.location = 'ConductoresController.php?opcion=listar';
            </script>";
        }
    }
}

$opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'listar';
$controller = new ConductoresController();

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