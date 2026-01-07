<?php
include '../models/Empleado.php';

class EmpleadosController {
    private $model;

    public function __construct() {
        $this->model = new Empleado();
    }

    public function listar() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10; // Número de resultados por página
        $offset = ($page - 1) * $limit;

        $result = $this->model->listar($search, $limit, $offset);
        $empleados = $result['empleados'];
        $total = $result['total'];
        $totalPages = ceil($total / $limit);

        include '../views/empleados/index.php';
    }


    public function crear() {
        include '../views/empleados/create.php';
    }

    public function guardar() {
        $apellidos = $_POST['apellidos'];
        $nombres = $_POST['nombres'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $descripcion = $_POST['descripcion'];

        if ($this->model->crear($apellidos, $nombres, $fecha_nacimiento, $descripcion)) {
            echo "<script>
                alert('Empleado agregado correctamente.');
                window.location = 'EmpleadosController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al agregar el empleado.');
                window.location = 'EmpleadosController.php?opcion=crear';
            </script>";
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $empleado = $this->model->obtenerPorId($id);
        include '../views/empleados/edit.php';
    }

    public function actualizar() {
        $id = $_POST['id'];
        $apellidos = $_POST['apellidos'];
        $nombres = $_POST['nombres'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $descripcion = $_POST['descripcion'];

        if ($this->model->actualizar($id, $apellidos, $nombres, $fecha_nacimiento, $descripcion)) {
            echo "<script>
                alert('Empleado actualizado correctamente.');
                window.location = 'EmpleadosController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al actualizar el empleado.');
                window.location = 'EmpleadosController.php?opcion=editar&id=$id';
            </script>";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        if ($this->model->eliminar($id)) {
            echo "<script>
                alert('Empleado eliminado correctamente.');
                window.location = 'EmpleadosController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al eliminar el empleado.');
                window.location = 'EmpleadosController.php?opcion=listar';
            </script>";
        }
    }
}

$opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'listar';
$controller = new EmpleadosController();

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
