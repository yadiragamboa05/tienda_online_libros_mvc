<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Editar Orden Detalle</h1>
        <?php
        include '../../includes/db.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM OrdenDetalles WHERE ID_OrdenDetalles = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <form action="OrdenDetalleController.php?opcion=actualizar" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['ID_OrdenDetalles']; ?>">

            <label for="id_orden">ID Orden:</label>
            <select id="id_orden" name="id_orden" value="<?php echo $row['ID_Orden']; ?>" required>
                <?php
                $sql = "SELECT * FROM Ordenes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($orden = $result->fetch_assoc()) {
                        $selected = $orden['ID_Orden'] == $row['ID_Orden'] ? 'selected' : '';
                        echo "<option value='{$orden['ID_Orden']}' $selected>{$orden['ID_Orden']}</option>";
                    }
                }
                ?>
            </select>

            <label for="id_producto">ID Producto:</label>
            <select id="id_producto" name="id_producto" value="<?php echo $row['ID_Libro']; ?>" required>
                <?php
                $sql = "SELECT * FROM Productos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($producto = $result->fetch_assoc()) {
                        $selected = $producto['ID_Libro'] == $row['ID_Libro'] ? 'selected' : '';
                        echo "<option value='{$producto['ID_Libro']}' $selected>{$producto['ID_Libro']}: {$producto['Titulo']}</option>";
                    }
                }
                ?>
            </select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="<?php echo $row['Cantidad']; ?>" required>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>    
</div>

<script>
$(document).ready(function() {
    $('#id_orden').select2();
    $('#id_producto').select2();
});
</script>

<?php include '../views/templates/footer.php'; ?>