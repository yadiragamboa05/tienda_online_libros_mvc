<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['username'], $_POST['password'])) {
        $_SESSION['error'] = "Por favor, complete ambos campos.";
        header("Location: /tienda_online_libros_mvc/login.php");
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
            
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $user_name;
                $_SESSION['role'] = $role;

                $query_cliente = "SELECT ID_Cliente FROM clientes WHERE ID_Cliente = ?";
                $stmt_cliente = $conn->prepare($query_cliente);
                $stmt_cliente->bind_param("i", $user_id);
                $stmt_cliente->execute();
                $stmt_cliente->store_result();

                if ($stmt_cliente->num_rows > 0) {
                    $stmt_cliente->bind_result($id_cliente);
                    $stmt_cliente->fetch();
                    $_SESSION['id_cliente'] = $id_cliente;
                }

                header("Location: /tienda_online_libros_mvc/user/index.php");
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
