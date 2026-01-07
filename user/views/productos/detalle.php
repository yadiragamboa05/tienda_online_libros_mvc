<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Producto</title>
    <link rel="shortcut icon" type="image/jpeg" href="/tienda_online_libros_mvc/imagenes/icon.jpeg">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../views/templates/header.php'; ?>
    <div class="container">
        <div class="product-details">
            <div class="image-container">
                <img src="<?php echo $producto['Link_Imagen']; ?>" alt="<?php echo $producto['Titulo']; ?>">
            </div>
            <div class="info-container">
                <h2><?php echo $producto['Titulo']; ?></h2>
                <p><strong>Autor:</strong> <?php echo $producto['Autor']; ?></p>
                <p><strong>Editorial:</strong> <?php echo $producto['Editorial']; ?></p>
                <p><strong>Fecha de Publicación:</strong> <?php echo $producto['Fecha_Publicacion']; ?></p>
                <p><strong>Número de Páginas:</strong> <?php echo $producto['Num_Paginas']; ?> páginas</p>
                <p class="price">S/<?php echo $producto['Precio']; ?></p>
                <form method="post" action="../controllers/ProductoController.php?action=agregarAlCarrito">
                    <input type="hidden" name="product_id" value="<?php echo $producto['ID_Libro']; ?>">
                    <label for="quantity">Cantidad:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1">
                    <button type="submit" name="add_to_cart">Agregar al Carrito</button>
                </form>
            </div>
        </div>
    </div>
    <?php include '../views/templates/footer.php'; ?>
</body>
</html>
