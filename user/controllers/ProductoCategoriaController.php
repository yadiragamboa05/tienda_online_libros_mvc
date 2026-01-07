<?php

include '../models/ProductoCategoria.php';
include '../models/CarritoCategoria.php';

class ProductoController {

    public function detalle($id) {
        $productoModel = new Producto();
        $producto = $productoModel->obtenerPorId($id);
        include '../views/producto/detalle.php';
    }

    public function listarPorCategoria($categoriaId) {
        $productoModel = new Producto();
        $productos = $productoModel->obtenerPorCategoria($categoriaId);
        include '../views/categoria/index.php';
    }

    public function agregarAlCarrito() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_libro = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
            $cantidad = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

            $carritoModel = new Carrito();
            if ($carritoModel->agregarAlCarrito($id_libro, $cantidad)) {
                header("Location: ../carrito/index.php");
                exit();
            } else {
                echo "<p>Error al agregar al carrito. Inténtalo de nuevo.</p>";
            }
        }
    }
}

?>
