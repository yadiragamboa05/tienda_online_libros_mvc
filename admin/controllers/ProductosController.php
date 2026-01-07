<?php
include '../models/Productos.php';

class ProductosController {
    private $model;

    public function __construct() {
        $this->model = new Productos();
    }

    public function listar() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $totalProductos = $this->model->contar($search);
        $totalPages = ceil($totalProductos / $limit);

        $productos = $this->model->listar($search, $limit, $offset);

        include '../views/productos/index.php';
    }


    public function crear() {
        include '../views/productos/create.php';
    }

    public function guardar() {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $isbn = $_POST['isbn'];
        $id_proveedor = $_POST['proveedor'];
        $id_categoria = $_POST['categoria'];
        $editorial = $_POST['editorial'];
        $fecha_publicacion = $_POST['fecha_publicacion'];
        $num_paginas = $_POST['num_paginas'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $imagen_url = $_POST['imagen_url'];
        $resultado = $this->model->crear($titulo, $autor, $isbn, $id_proveedor, $id_categoria, $editorial, $fecha_publicacion, $num_paginas, $precio, $stock, $imagen_url);

        if ($resultado) {
            echo "<script>
                alert('Producto agregado correctamente.');
                window.location = '../controllers/ProductosController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al agregar el producto.');
                window.location = '../controllers/ProductosController.php?opcion=crear';
            </script>";
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $producto = $this->model->obtener($id);
        include '../views/productos/edit.php';
    }

    public function actualizar() {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $isbn = $_POST['isbn'];
        $id_proveedor = $_POST['proveedor'];
        $id_categoria = $_POST['categoria'];
        $editorial = $_POST['editorial'];
        $fecha_publicacion = $_POST['fecha_publicacion'];
        $num_paginas = $_POST['num_paginas'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $imagen_url = $_POST['imagen_url'];
        $resultado = $this->model->actualizar($id, $titulo, $autor, $isbn, $id_proveedor, $id_categoria, $editorial, $fecha_publicacion, $num_paginas, $precio, $stock, $imagen_url);

        if ($resultado) {
            echo "<script>
                alert('Producto actualizado correctamente.');
                window.location = '../controllers/ProductosController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al actualizar el producto.');
                window.location = '../controllers/ProductosController.php?opcion=editar&id={$id}';
            </script>";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $resultado = $this->model->eliminar($id);

        if ($resultado) {
            echo "<script>
                alert('Producto eliminado correctamente.');
                window.location = '../controllers/ProductosController.php?opcion=listar';
            </script>";
        } else {
            echo "<script>
                alert('Error al eliminar el producto.');
                window.location = '../controllers/ProductosController.php?opcion=listar';
            </script>";
        }
    }
}

if (isset($_GET['opcion'])) {
    $controller = new ProductosController();

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
    (new ProductosController())->listar();
}
?>
