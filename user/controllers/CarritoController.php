<?php 
session_start();
include '../models/Productos.php';
include '../models/Ordenes.php';
include '../models/Carrito.php';

class CarritoController {
    private $productosModel;
    private $ordenesModel;
    private $carritoModel;

    public function __construct() {
        $this->productosModel = new Producto();
        $this->ordenesModel = new Ordenes();
        $this->carritoModel = new Carrito();
        $this->initializeCart();
    }

    private function checkUserSession() {
        if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
            $_SESSION['user_id'] = $_COOKIE['user_id'];
            $_SESSION['username'] = $_COOKIE['username'];
            $_SESSION['role'] = $_COOKIE['role'];
            if (isset($_COOKIE['id_cliente'])) {
                $_SESSION['id_cliente'] = $_COOKIE['id_cliente'];
            }
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: /tienda_online_libros_mvc/login.php");
            exit();
        }
    }

    private function initializeCart() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function manejarCarrito() {
        $accion = isset($_GET['accion']) ? $_GET['accion'] : 'ver';

        switch ($accion) {
            case 'agregar':
                $this->agregarAlCarrito();
                break;
            case 'eliminar':
                $this->eliminarDelCarrito();
                break;
            case 'checkout':
                $this->finalizarCompra();
                break;
            default:
                $this->verCarrito();
                break;
        }
    }

    private function agregarAlCarrito() {
        $id_libro = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        $cantidad = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

        if ($this->carritoModel->agregarAlCarrito($id_libro, $cantidad)) {
            header("Location: ../views/carrito/index.php");
            exit();
        } else {
            echo "<script>
                alert('Error al agregar al carrito.');
                window.location.href = '../buscar.php';
                </script>";
        }
    }

    private function eliminarDelCarrito() {
        $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        if ($product_id > 0) {
            unset($_SESSION['cart'][$product_id]);
            header("Location: CarritoController.php");
            exit();
        } else {
            echo "<script>
                alert('Error al eliminar del carrito.');
                window.location.href = 'CarritoController.php';
                </script>";
        }
    }

    private function finalizarCompra() {
        if (!isset($_SESSION['id_cliente'])) {
            header("Location: /tienda_online_libros_mvc/user/controllers/ClientesController.php");
            exit();
        }

        $id_cliente = $_SESSION['id_cliente'];
        $id_empleado = 1;
        $fecha_orden = date("Y-m-d");
        $id_conductor = 1;

        if ($this->ordenesModel->crearOrden($id_cliente, $id_empleado, $fecha_orden, $id_conductor)) {
            unset($_SESSION['cart']);
            echo "<script>
                alert('Compra realizada con éxito.');
                window.location.href = 'CarritoController.php';
                </script>";
        } else {
            echo "<script>
                alert('Error al realizar la compra.');
                window.location.href = 'CarritoController.php';
                </script>";
        }
    }

    private function verCarrito() {
        $productosEnCarrito = [];
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $producto = $this->productosModel->obtenerPorId($product_id);
                $producto['cantidad'] = $quantity;
                $productosEnCarrito[] = $producto;
            }
        }

        include '../views/carrito/index.php';
    }
}

$controller = new CarritoController();
$controller->manejarCarrito();
?>