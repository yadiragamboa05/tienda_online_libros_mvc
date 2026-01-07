<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Agregar Conductor</h1>
        <form action="ConductoresController.php?opcion=guardar" method="POST">
            <label for="nombre">Nombre del Conductor</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="celular">Celular</label>
            <input type="text" id="celular" name="celular" required>

            <button type="submit">Guardar</button>
        </form>    
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>
