<?php include '../views/templates/header.php'; ?>

<div class="container-libros">
    <h1>Buscar Productos</h1>
    <form method="GET" action="../controllers/ProductoController.php">
        <input type="hidden" name="action" value="buscar">
        <input type="text" name="query" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>
    <div class="resultados">
        <div class="container-productos">
            <div class="cont-productos">
                <?php
                if (!empty($productos)) {
                    foreach ($productos as $producto) {
                        echo '<div class="caja-producto">';
                        echo '<a href="../controllers/ProductoController.php?action=detalle&id='.$producto['ID_Libro'].'">';
                        echo '<img src="' . $producto['Link_Imagen'] . '">';
                        echo '<div class="caja-titulo">';
                        echo '<h2>'.$producto['Titulo'].'</h2>';
                        echo '</div>';
                        echo '<h3>'.$producto['Autor'].'</h3>';
                        echo '<p>S/'.$producto['Precio'].'</p>';
                        echo '</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No se encontraron productos</p>';
                }
                ?>
            </div> 
        </div>    
    </div>
</div>

<?php include '../views/templates/footer.php'; ?>