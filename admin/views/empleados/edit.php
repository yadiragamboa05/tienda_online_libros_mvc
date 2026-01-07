<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Editar Empleado</h1>
        <form action="EmpleadosController.php?opcion=actualizar" method="POST">
            <input type="hidden" name="id" value="<?php echo $empleado['ID_Empleado']; ?>">

            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $empleado['Apellidos']; ?>" required>

            <label for="nombres">Nombres</label>
            <input type="text" id="nombres" name="nombres" value="<?php echo $empleado['Nombres']; ?>" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $empleado['Fecha_de_nacimiento']; ?>" required>

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" required><?php echo $empleado['Descripción']; ?></textarea>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>    
</div>
<?php include '../views/templates/footer.php'; ?>
