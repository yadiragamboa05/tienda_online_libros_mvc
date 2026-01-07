<?php include '../views/templates/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="shortcut icon" type="image/jpeg" href="/tienda_online_libros_mvc/imagenes/icon.jpeg">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="cart">
        <h1>Carrito de Compras</h1>
        <?php if (!empty($productosEnCarrito)) : ?>
            <?php foreach ($productosEnCarrito as $producto) : ?>
                <div class='cart-item'>
                    <p><?php echo $producto['Titulo']; ?> - Cantidad: <?php echo $producto['cantidad']; ?> - Precio: S/<?php echo $producto['Precio']; ?></p>
                    <form method='post' action='../controllers/CarritoController.php?accion=eliminar'>
                        <input type='hidden' name='product_id' value='<?php echo $producto['ID_Libro']; ?>'>
                        <label for='quantity'>Cantidad:</label>
                        <input type='number' name='quantity' value='<?php echo $producto['cantidad']; ?>' min='0'>
                        <input type='hidden' name='product_id' value='<?php echo $producto['ID_Libro']; ?>'>
                        <button type='submit' name='remove_from_cart'>Eliminar</button>
                    </form>
                </div>
            <?php endforeach; ?>
            <form method='post' action='../controllers/CarritoController.php?accion=checkout'>
                <button type='submit' name='checkout'>Finalizar Compra</button>
            </form>
        <?php else : ?>
            <p>Tu carrito está vacío</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php include '../views/templates/footer.php'; ?>