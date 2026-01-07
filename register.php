<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['username'], $_POST['password'], $_POST['confirm_password'])) {
        $_SESSION['error'] = "Por favor, complete todos los campos.";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);

        if ($password !== $confirm_password) {
            $_SESSION['error'] = "Las contraseñas no coinciden.";
        } else {
            // Preparar la consulta SQL para prevenir SQL Injection
            if ($stmt = $conn->prepare("SELECT ID_Usuario FROM Usuarios WHERE Nombre_Usuario = ?")) {
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    echo "<script>
                        alert('El usuario ya existe');
                        window.location = 'register.php';
                    </script>";
                    exit();
                } else {
                    // Insertar el nuevo usuario en la base de datos
                    if ($stmt = $conn->prepare("INSERT INTO Usuarios (Nombre_Usuario, Contrasena, Rol) VALUES (?, ?, 'cliente')")) {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $stmt->bind_param('ss', $username, $hashed_password);

                        if ($stmt->execute()) {
                            echo "<script>
                                alert('Registro exitoso');
                                window.location = 'login.php';
                            </script>";
                            exit();
                        } else {
                            $_SESSION['error'] = "Error en la base de datos. Por favor, inténtelo de nuevo más tarde.";
                        }
                    } else {
                        $_SESSION['error'] = "Error en la base de datos. Por favor, inténtelo de nuevo más tarde.";
                    }
                }

                $stmt->close();
            } else {
                $_SESSION['error'] = "Error en la base de datos. Por favor, inténtelo de nuevo más tarde.";
            }
        }
    }

    header("Location: register.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/css/style_start.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Registro</h2>
            <?php
            if (isset($_SESSION['error'])) {
                echo "<p class='error'>{$_SESSION['error']}</p>";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo "<p class='success'>{$_SESSION['success']}</p>";
                unset($_SESSION['success']);
            }
            ?>
            <form action="register.php" method="post">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <label for="confirm_password">Confirmar contraseña:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <button type="submit">Registrar</button>
            </form>
            <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></p>
        </div>
    </div>
</body>
</html>