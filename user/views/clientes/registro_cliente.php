<?php include '../views/templates/header.php'; ?>

<div class="registro-container">
    <h1>Registrar Cliente</h1>
    <form method="post" action="ClientesController.php?opcion=registrar">
        <div>
            <label for="nombre_cliente">Nombre Cliente:</label>
            <input type="text" id="nombre_cliente" name="nombre_cliente" required>
        </div>
        <div>
            <label for="nombre_contacto">Nombre Contacto:</label>
            <input type="text" id="nombre_contacto" name="nombre_contacto" required>
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
        </div>
        <div>
            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required>
        </div>
        <div>
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" id="codigo_postal" name="codigo_postal" required>
        </div>
        <div>
            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required>
        </div>
        <button type="submit">Registrar</button>
    </form>
</div>

<?php include '../views/templates/footer.php'; ?>