<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Agregar Cliente</h1>
        <form action="ClientesController.php?opcion=guardar" method="POST">
            <label for="nombre_cliente">Nombre Cliente:</label>
            <input type="text" id="nombre_cliente" name="nombre_cliente" required>

            <label for="nombre_contacto">Nombre Contacto:</label>
            <input type="text" id="nombre_contacto" name="nombre_contacto" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required>
    
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" id="codigo_postal" name="codigo_postal" required>
    
            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required>
    
            <button type="submit">Guardar</button>
        </form>        
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>
