<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Agregar Proveedor</h1>
        <form action="ProveedorController.php?opcion=guardar" method="POST">
            <label for="nombre">Nombre del Proveedor</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="contacto">Nombre del Contacto</label>
            <input type="text" id="contacto" name="contacto" required>

            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="ciudad">Ciudad</label>
            <input type="text" id="ciudad" name="ciudad" required>

            <label for="codigo_postal">Código Postal</label>
            <input type="text" id="codigo_postal" name="codigo_postal" required>

            <label for="pais">País</label>
            <input type="text" id="pais" name="pais" required>

            <label for="celular">Celular</label>
            <input type="text" id="celular" name="celular" required>

            <button type="submit">Guardar</button>
        </form>    
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>
