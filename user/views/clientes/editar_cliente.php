<?php include '../views/templates/header.php'; ?>

<div class="perfil-container">
    <h1>Editar Información del Cliente</h1>
    <form action="ClientesController.php?opcion=editar" method="post">
        <label for="nombre_cliente">Nombre Cliente:</label>
        <input type="text" id="nombre_cliente" name="nombre_cliente" value="<?php echo htmlspecialchars($cliente['Nombre_Cliente']); ?>" required>

        <label for="nombre_contacto">Nombre Contacto:</label>
        <input type="text" id="nombre_contacto" name="nombre_contacto" value="<?php echo htmlspecialchars($cliente['Nombre_Contacto']); ?>" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($cliente['Direccion']); ?>" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" value="<?php echo htmlspecialchars($cliente['Ciudad']); ?>" required>

        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" value="<?php echo htmlspecialchars($cliente['Codigo_Postal']); ?>" required>

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" value="<?php echo htmlspecialchars($cliente['Pais']); ?>" required>

        <button type="submit">Actualizar Información</button>
    </form>
</div>

<?php include '../views/templates/footer.php'; ?>