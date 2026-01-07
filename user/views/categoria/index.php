<?php include '../views/templates/header.php'; ?>

<div class="container-libros">
    <h1>Productos en Categoría</h1>
    <div class="resultados">
        <div class="producto-details">
            <div class="cont-productos">
                <?php
                if (!empty($productos)) {
                    foreach ($productos as $producto) {
                        echo '<a href="../controllers/ProductoController.php?action=detalle&id='.$producto['ID_Libro'].'">';
                        echo '<div class="caja-producto">';
                        echo '<img src="' . $producto['Link_Imagen'] . '">';
                        echo '<div class="caja-titulo">';
                        echo '<h2>' . $producto['Titulo'] . '</h2>';
                        echo '</div>';
                        echo '<h3>' . $producto['Autor'] . '</h3>';
                        echo '<p>S/' . $producto['Precio'] . '</p>';
                        echo '</div>';
                        echo '</a>';
                    }
                } else {
                    echo '<p>No hay productos en esta categoría.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include '../views/templates/footer.php'; ?>
