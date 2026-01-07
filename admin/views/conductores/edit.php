<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Editar Conductor</h1>
        <form action="ConductoresController.php?opcion=actualizar" method="POST">
            <input type="hidden" name="id" value="<?php echo $conductor['ID_Conductor']; ?>">

            <label for="nombre">Nombre del Conductor</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $conductor['Nombre_Conductor']; ?>" required>

            <label for="celular">Celular</label>
            <input type="text" id="celular" name="celular" value="<?php echo $conductor['Celular']; ?>" required>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>    
</div>
<?php include '../views/templates/footer.php'; ?>
