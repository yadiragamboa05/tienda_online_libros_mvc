<?php
include '../models/Categorias.php';

class CategoriasController {
    private $model;

    public function __construct() {
        $this->model = new Categorias();
    }

    public function listar() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $result = $this->model->listar($search, $limit, $offset);
        $categorias = $result['categorias'];
        $total = $result['total'];
        $totalPages = ceil($total / $limit);

        include '../views/categorias/index.php';
    }


    public function crear() {
        include '../views/categorias/create.php';
    }

    public function guardar() {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $resultado = $this->model->crear($nombre, $descripcion);

        if ($resultado) {
            echo "<script>
                alert('Categoría agregada correctamente.');
                window.location = '../controllers/CategoriasController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al agregar la categoría.');
                window.location = '../controllers/CategoriasController.php?opcion=crear';
            </script>";
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $categoria = $this->model->obtener($id);
        include '../views/categorias/edit.php';
    }

    public function actualizar() {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $resultado = $this->model->actualizar($id, $nombre, $descripcion);

        if ($resultado) {
            echo "<script>
                alert('Categoría actualizada correctamente.');
                window.location = '../controllers/CategoriasController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al actualizar la categoría.');
                window.location = '../controllers/CategoriasController.php?opcion=editar&id={$id}';
            </script>";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $resultado = $this->model->eliminar($id);

        if ($resultado) {
            echo "<script>
                alert('Categoría eliminada correctamente.');
                window.location = '../controllers/CategoriasController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al eliminar la categoría.');
                window.location = '../controllers/CategoriasController.php?opcion=listar';
            </script>";
        }
    }
}

if (isset($_GET['opcion'])) {
    $controller = new CategoriasController();

    switch ($_GET['opcion']) {
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
} else {
    (new CategoriasController())->listar();
}
?>
