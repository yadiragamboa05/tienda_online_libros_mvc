<?php
session_start();
session_destroy();
header("Location: /tienda_online_libros_mvc/login.php");
?>
