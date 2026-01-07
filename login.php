<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['username'], $_POST['password'])) {
        $_SESSION['error'] = "Por favor, complete ambos campos.";
        header("Location: /tienda_online_libros_mvc/login.php");
        exit();
    }
// Verificar si el cliente ya está registrado
if (!isset($_SESSION['id_cliente'])) {
    header("Location: /tienda_online_libros_mvc/perfil/registro_cliente.php");
    exit();
}

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($stmt = $conn->prepare("SELECT ID_Usuario, Nombre_Usuario, Contrasena, Rol FROM Usuarios WHERE Nombre_Usuario = ?")) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $user_name, $hashed_password, $role);
            $stmt->fetch();
            
            // Verificar la contraseña
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $user_name;
                $_SESSION['role'] = $role;
                
                header("Location: /tienda_online_libros_mvc/index.php");
                exit();
            } else {
                $_SESSION['error'] = "Contraseña incorrecta";
                header("Location: /tienda_online_libros_mvc/login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Usuario no encontrado";
            header("Location: /tienda_online_libros_mvc/login.php");
            exit();
        }
        
        $stmt->close();
    } else {
        $_SESSION['error'] = "Error en la base de datos. Por favor, inténtelo de nuevo más tarde.";
        header("Location: /tienda_online_libros_mvc/login.php");
        exit();
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="assets/css/style_start.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <div class="form-container">
            <h2>Iniciar Sesión</h2>
            <?php
            if (isset($_SESSION['error'])) {
                echo "<p class='error'>{$_SESSION['error']}</p>";
                unset($_SESSION['error']);
            }
            ?>
            <form action="login_check.php" method="post">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Ingresar</button>
            </form>
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate</a></p>
        </div>
    </div>
</body>
</html>
