<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /tienda_online_libros_mvc/login.php");
    exit();
} else {
    header("Location: /tienda_online_libros_mvc/user/index.php");
    exit();
}
?>