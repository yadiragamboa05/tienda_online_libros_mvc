<?php include '../views/templates/header.php'; ?>
<div class="container">
    <h1>Editar Cliente</h1>
    <form action="ClientesController.php?opcion=actualizar" method="POST">
        <input type="hidden" name="id" value="<?= $cliente['ID_Cliente'] ?>">

        <label for="nombre_cliente">Nombre Cliente:</label>
        <input type="text" id="nombre_cliente" name="nombre_cliente" value="<?= $cliente['Nombre_Cliente'] ?>" required>

        <label for="nombre_contacto">Nombre Contacto:</label>
        <input type="text" id="nombre_contacto" name="nombre_contacto" value="<?= $cliente['Nombre_Contacto'] ?>" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?= $cliente['Direccion'] ?>" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" value="<?= $cliente['Ciudad'] ?>">

        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" value="<?= $cliente['Codigo_Postal'] ?>">

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" value="<?= $cliente['Pais'] ?>">

        <button type="submit">Guardar Cambios</button>
    </form>
</div>
<?php include '../views/templates/footer.php'; ?>
