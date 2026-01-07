<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Actualizar Producto</h1>
        <form action="../controllers/ProductosController.php?opcion=actualizar" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto['ID_Libro']; ?>">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $producto['Titulo']; ?>" required>

            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor" value="<?php echo $producto['Autor']; ?>" required>

            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" value="<?php echo $producto['ISBN']; ?>" required>

            <label for="proveedor">Proveedor</label>
            <select id="proveedor" name="proveedor" required>
                <?php
                include '../../includes/db.php';
                $sql = "SELECT * FROM Proveedores";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($proveedor = $result->fetch_assoc()) {
                        $selected = $proveedor['ID_Proveedor'] == $producto['ID_Proveedor'] ? 'selected' : '';
                        echo "<option value='{$proveedor['ID_Proveedor']}' $selected>{$proveedor['Nombre_Proveedor']}</option>";
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
                        $selected = $categoria['ID_Categoria'] == $producto['ID_Categoria'] ? 'selected' : '';
                        echo "<option value='{$categoria['ID_Categoria']}' $selected>{$categoria['Nombre_Categoria']}</option>";
                    }
                }
                ?>
            </select>

            <label for="editorial">Editorial</label>
            <input type="text" id="editorial" name="editorial" value="<?php echo $producto['Editorial']; ?>">

            <label for="fecha_publicacion">Fecha de Publicación</label>
            <input type="date" id="fecha_publicacion" name="fecha_publicacion" value="<?php echo $producto['Fecha_Publicacion']; ?>">

            <label for="num_paginas">Número de Páginas</label>
            <input type="number" id="num_paginas" name="num_paginas" value="<?php echo $producto['Num_Paginas']; ?>" required>

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" value="<?php echo $producto['Precio']; ?>" step="0.01" required>

            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="<?php echo $producto['Stock']; ?>" required>

            <label for="imagen_url">URL de la Imagen</label>
            <input type="text" id="imagen_url" name="imagen_url" value="<?php echo $producto['Link_Imagen']; ?>" required>

            <button type="submit" name="submit">Guardar Cambios</button>
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
