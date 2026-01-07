<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Agregar Producto</h1>
        <form action="../controllers/ProductosController.php?opcion=guardar" method="POST">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor" required>

            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" required>

            <label for="proveedor">Proveedor</label>
            <select id="proveedor" name="proveedor" required>
                <?php
                include '../../includes/db.php';
                $sql = "SELECT * FROM Proveedores";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($proveedor = $result->fetch_assoc()) {
                        echo "<option value='{$proveedor['ID_Proveedor']}'>{$proveedor['Nombre_Proveedor']}</option>";
                    }
                }
                ?>
            </select>

            <label for="categoria">Categoría</label>
            <select id="categoria" name="categoria" required>
                <?php
                $sql = "SELECT * FROM Categorias";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($categoria = $result->fetch_assoc()) {
                        echo "<option value='{$categoria['ID_Categoria']}'>{$categoria['Nombre_Categoria']}</option>";
                    }
                }
                ?>
            </select>

            <label for="editorial">Editorial</label>
            <input type="text" id="editorial" name="editorial">

            <label for="fecha_publicacion">Fecha de Publicación</label>
            <input type="date" id="fecha_publicacion" name="fecha_publicacion">

            <label for="num_paginas">Número de Páginas</label>
            <input type="number" id="num_paginas" name="num_paginas" required>

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" step="0.01" required>

            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" required>

            <label for="imagen_url">URL de la Imagen</label>
            <input type="text" id="imagen_url" name="imagen_url" required>

            <button type="submit" name="submit">Agregar</button>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#proveedor').select2();
    $('#categoria').select2();
});
</script>

<?php include '../views/templates/footer.php'; ?>
