<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Agregar Orden Detalle</h1>
        <form action="OrdenDetalleController.php?opcion=guardar" method="POST">
            <label for="id_orden">ID Orden:</label>
            <select id="id_orden" name="id_orden" required>
                <?php
                include '../../includes/db.php';
                $sql = "SELECT * FROM Ordenes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['ID_Orden']}'>{$row['ID_Orden']}</option>";
                    }
                }
                ?>
            </select>

            <label for="id_libro">ID Libro:</label>
            <select id="id_libro" name="id_libro" required>
                <?php
                $sql = "SELECT * FROM Productos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['ID_Libro']}'>{$row['ID_Libro']}: {$row['Titulo']}</option>";
                    }
                }
                ?>
            </select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required>

            <button type="submit" name="submit">Guardar</button>
        </form>    
    </div>
</div>

<script>
$(document).ready(function() {
    $('#id_orden').select2();
    $('#id_libro').select2();
});
</script>

<?php include '../views/templates/footer.php'; ?>
