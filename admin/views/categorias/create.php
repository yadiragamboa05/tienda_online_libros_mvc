<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Agregar Categoría</h1>
        <form action="../controllers/CategoriasController.php?opcion=guardar" method="POST">
            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion"></textarea><br>

            <button type="submit">Guardar</button>
        </form>        
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>
