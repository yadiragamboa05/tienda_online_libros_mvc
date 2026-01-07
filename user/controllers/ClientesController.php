<?php
include '../models/Clientes.php';

class ClientesController {
    private $model;

    public function __construct() {
        $this->model = new Cliente();
    }

    public function index() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../login.php");
            exit();
        }

        if (!isset($_SESSION['id_cliente'])) {
            header("Location: ClientesController.php?opcion=registrar");
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $cliente = $this->model->getClienteById($user_id);
        $ordenes = $this->model->getOrdenesByClienteId($user_id);
        include '../views/clientes/index.php';
    }

    public function editar() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../login.php");
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $cliente = $this->model->getClienteById($user_id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_cliente = $_POST['nombre_cliente'];
            $nombre_contacto = $_POST['nombre_contacto'];
            $direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];
            $codigo_postal = $_POST['codigo_postal'];
            $pais = $_POST['pais'];

            $this->model->updateCliente($user_id, $nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais);
            header("Location: ClientesController.php?opcion=index");
            exit();
        }
        include '../views/clientes/editar_cliente.php';
    }

    public function registrar() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../login.php");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_SESSION['user_id'];
            $nombre_cliente = $_POST['nombre_cliente'];
            $nombre_contacto = $_POST['nombre_contacto'];
            $direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];
            $codigo_postal = $_POST['codigo_postal'];
            $pais = $_POST['pais'];

            $this->model->registrarCliente($user_id, $nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais);
            $_SESSION['id_cliente'] = $user_id;
            header("Location: ClientesController.php?opcion=index");
            exit();
        }
        include '../views/clientes/registro_cliente.php';
    }
}

$opcion = isset($_GET['opcion']) ? $_GET['opcion'] : 'index';
$controller = new ClientesController();

switch ($opcion) {
    case 'index':
        $controller->index();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'registrar':
        $controller->registrar();
        break;
    default:
        $controller->index();
        break;
}
?>
