<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Editar Orden</h1>
        <form action="OrderController.php?opcion=actualizar" method="POST">
            <input type="hidden" name="id" value="<?php echo $orden['ID_Orden']; ?>">

            <label for="cliente">Cliente</label>
            <select id="cliente" name="id_cliente" required>
                <?php
                include '../../includes/db.php';
                $sql = "SELECT * FROM Clientes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $selected = $row['ID_Cliente'] == $orden['ID_Cliente'] ? 'selected' : '';
                        echo "<option value='{$row['ID_Cliente']}' $selected>{$row['Nombre_Cliente']}</option>";
                    }
                }
                ?>
            </select>

            <label for="empleado">Empleado</label>
            <select id="empleado" name="id_empleado" required>
                <?php
                include '../../includes/db.php';
                $sql = "SELECT * FROM Empleados";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $selected = $row['ID_Empleado'] == $orden['ID_Empleado'] ? 'selected' : '';
                        echo "<option value='{$row['ID_Empleado']}' $selected>{$row['Nombres']} {$row['Apellidos']}</option>";
                    }
                }
                ?>
            </select>

            <label for="fecha_orden">Fecha de Orden</label>
            <input type="date" id="fecha_orden" name="fecha_orden" value="<?php echo $orden['Fecha_Orden']; ?>" required>

            <label for="conductor">Conductor</label>
            <select id="conductor" name="id_conductor" required>
                <?php
                include '../../includes/db.php';
                $sql = "SELECT * FROM Conductores";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $selected = $row['ID_Conductor'] == $orden['ID_Conductor'] ? 'selected' : '';
                        echo "<option value='{$row['ID_Conductor']}' $selected>{$row['Nombre_Conductor']}</option>";
                    }
                }
                ?>
            </select>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>    
</div>

<script>
$(document).ready(function() {
    $('#cliente').select2();
    $('#empleado').select2();
    $('#conductor').select2();
});
</script>

<?php include '../views/templates/footer.php'; ?>
