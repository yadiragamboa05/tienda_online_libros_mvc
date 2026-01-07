<?php
session_start();
include '../models/Productos.php';
include '../models/Carrito.php';

class ProductoController {

    public function detalle($id) {
        $productoModel = new Producto();
        $producto = $productoModel->obtenerPorId($id);
        include '../views/productos/detalle.php';
    }

    public function listar() {
        $productoModel = new Producto();
        $productos = $productoModel->listarProductos();
        include '../views/productos/index.php';
    }

    public function listarPorCategoria($categoriaId) {
        $productoModel = new Producto();
        $productos = $productoModel->obtenerPorCategoria($categoriaId);
        include '../views/categoria/index.php';
    }

    public function buscar() {
        $productoModel = new Producto();
        $query = isset($_GET['query']) ? $_GET['query'] : '';
        if ($query) {
            $productos = $productoModel->buscarProductos($query);
        } else {
            $productos = $productoModel->listarProductos();
        }
        include '../views/productos/index.php';
    }

    public function agregarAlCarrito() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_libro = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
            $cantidad = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

            $carritoModel = new Carrito();
            if ($carritoModel->agregarCarrito($id_libro, $cantidad)) {
                header("Location: ../controllers/CarritoController.php");
                exit();
            } else {
                echo "<p>Error al agregar al carrito. Inténtalo de nuevo.</p>";
            }
        }
    }
}

if (isset($_GET['action'])) {
    $controller = new ProductoController();
    if ($_GET['action'] == 'detalle' && isset($_GET['id'])) {
        $controller->detalle((int)$_GET['id']);
    } elseif ($_GET['action'] == 'listar') {
        $controller->listar();
    } elseif ($_GET['action'] == 'agregarAlCarrito') {
        $controller->agregarAlCarrito();
    } elseif ($_GET['action'] == 'categoria' && isset($_GET['id'])) {
        $controller->listarPorCategoria((int)$_GET['id']);
    } elseif ($_GET['action'] == 'buscar') {
        $controller->buscar();
    }
}
?>

