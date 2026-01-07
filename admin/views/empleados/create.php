<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Agregar Empleado</h1>
        <form action="EmpleadosController.php?opcion=guardar" method="POST">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" required>

            <label for="nombres">Nombres</label>
            <input type="text" id="nombres" name="nombres" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <button type="submit">Guardar</button>
        </form>    
    </div>  
</div>
<?php include '../views/templates/footer.php'; ?>
