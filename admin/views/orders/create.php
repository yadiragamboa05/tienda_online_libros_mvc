<?php include '../views/templates/header.php'; ?>
<div class="text">
    <div class="container">
        <h1>Agregar Orden</h1>
        <form action="OrderController.php?opcion=guardar" method="POST">
            <label for="cliente">Cliente</label>
            <select id="cliente" name="id_cliente" required>
                <?php
                include '../../includes/db.php';
                $sql = "SELECT * FROM Clientes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['ID_Cliente']}'>{$row['Nombre_Cliente']}</option>";
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
                        echo "<option value='{$row['ID_Empleado']}'>{$row['Nombres']} {$row['Apellidos']}</option>";
                    }
                }
                ?>
            </select>

            <label for="fecha_orden">Fecha de Orden</label>
            <input type="date" id="fecha_orden" name="fecha_orden" required>

            <label for="conductor">Conductor</label>
            <select id="conductor" name="id_conductor" required>
                <?php
                include '../../includes/db.php';
                $sql = "SELECT * FROM Conductores";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['ID_Conductor']}'>{$row['Nombre_Conductor']}</option>";
                    }
                }
                ?>
            </select>

            <button type="submit">Guardar</button>
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
