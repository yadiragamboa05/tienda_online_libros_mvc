<?php include '../views/templates/header.php'; ?>
<div class="container">
    <h1>Editar Proveedor</h1>
    <?php
    include '../../includes/db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM Proveedores WHERE ID_Proveedor = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <form action="ProveedorController.php?opcion=actualizar" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['ID_Proveedor']; ?>">

        <label for="nombre">Nombre del Proveedor</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row['Nombre_Proveedor']; ?>" required>

        <label for="contacto">Nombre del Contacto</label>
        <input type="text" id="contacto" name="contacto" value="<?php echo $row['Nombre_Contacto']; ?>" required>

        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $row['Direccion']; ?>" required>

        <label for="ciudad">Ciudad</label>
        <input type="text" id="ciudad" name="ciudad" value="<?php echo $row['Ciudad']; ?>" required>

        <label for="codigo_postal">Código Postal</label>
        <input type="text" id="codigo_postal" name="codigo_postal" value="<?php echo $row['Codigo_Postal']; ?>" required>

        <label for="pais">País</label>
        <input type="text" id="pais" name="pais" value="<?php echo $row['Pais']; ?>" required>

        <label for="celular">Celular</label>
        <input type="text" id="celular" name="celular" value="<?php echo $row['Celular']; ?>" required>

        <button type="submit">Guardar Cambios</button>
    </form>
</div>
<?php include '../views/templates/footer.php'; ?>
