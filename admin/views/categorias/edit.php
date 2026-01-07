<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Editar Categoría</h1>
        <form action="../controllers/CategoriasController.php?opcion=actualizar" method="POST">
            <input type="hidden" name="id" value="<?= $categoria['ID_Categoria'] ?>">

            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $categoria['Nombre_Categoria'] ?>" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?= $categoria['Descripcion'] ?></textarea>

            <button type="submit">Guardar Cambios</button>
        </form>        
    </div>
</div>    
<?php include '../views/templates/footer.php'; ?>
