<?php
include '../includes/db.php';
include '../controllers/OrdenController.php';

$controller = new OrdenController($conn);

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    if ($action == 'delete') {
        $controller->delete($id);
    } else if ($action == 'update') {
        $controller->update($id);
    }
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'create') {
        $controller->create();
    } else {
        $controller->index();
    }
} else {
    $controller->index();
}
?>
