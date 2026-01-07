<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHONEKO</title>
    <link rel="shortcut icon" type="image/jpeg" href="/tienda_online_libros_mvc/imagenes/icon.jpeg">
    <link rel="stylesheet" href="/tienda_online_libros_mvc/user/views/assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <section class="home-section">
    <header>
        <div class="logo">
            <span class="img-logo">
                <img class="logo-img" src="/tienda_online_libros_mvc/imagenes/favicon.jpeg">
            </span>
            <span>
                <h1>SHONEKO (書猫)</h1>
            </span>
        </div>
        <nav class="nav-links">
            <a href="/tienda_online_libros_mvc/user/">INICIO</a>
            <a href="/tienda_online_libros_mvc/user/controllers/ProductoController.php?action=listar">LIBROS</a>
            <div class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">CATEGORÍAS</a>
                <div class="dropdown-content-cat">
                    <?php
                    include $_SERVER['DOCUMENT_ROOT'] . '/tienda_online_libros_mvc/includes/db.php';
                    $sql = "SELECT * FROM Categorias";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<a href="/tienda_online_libros_mvc/user/controllers/ProductoController.php?action=categoria&id=' . $row['ID_Categoria'] . '">' . $row['Nombre_Categoria'] . '</a>';
                        }
                    }
                    ?>

                </div>
            </div>
        </nav>
        <div class="user-actions">
            <div class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">
                    <div class="Usuario">
                        <div class="img-usuario">
                            <img id="Usuario" src="/tienda_online_libros_mvc/imagenes/user.png" alt="Usuario">
                        </div>
                        <div class="word-usuario">
                           <?php echo "Hola " . $_SESSION['username']; ?> 
                        </div>
                    </div>
                </a>
                <div class="dropdown-content">
                    <a href="/tienda_online_libros_mvc/user/controllers/ClientesController.php?opcion=index">Ver perfil</a>
                    <?php if ($_SESSION['role'] == 'administrador'): ?>
                        <a href="/tienda_online_libros_mvc/admin/index.php">Panel admin</a>
                    <?php endif; ?>
                    <a href="/tienda_online_libros_mvc/logout.php">Cerrar Sesión</a>
                </div>
            </div>                
            <a href="/tienda_online_libros_mvc/user/controllers/CarritoController.php">
                <div class="Carrito">
                    <div class="img-carrito">
                        <img src="/tienda_online_libros_mvc/imagenes/carrito.png" alt="Carrito"> 
                    </div>
                    <div class="word-carrito">
                        <?php echo "Carrito"; ?>
                    </div>     
                </div>
            </a>
        </div>
        </nav>
    </header>
</body>
</html>
<?php ob_end_flush(); ?>
