<?php include '../views/templates/header.php'; ?>

<div class="perfil-container">
    <h1>Perfil del Usuario</h1>
    <div class="cliente-info">
        <h2>Información del Cliente</h2>
        <p><strong>Nombre Cliente:</strong> <?php echo htmlspecialchars($cliente['Nombre_Cliente']); ?></p>
        <p><strong>Nombre Contacto:</strong> <?php echo htmlspecialchars($cliente['Nombre_Contacto']); ?></p>
        <p><strong>Dirección:</strong> <?php echo htmlspecialchars($cliente['Direccion']); ?></p>
        <p><strong>Ciudad:</strong> <?php echo htmlspecialchars($cliente['Ciudad']); ?></p>
        <p><strong>Código Postal:</strong> <?php echo htmlspecialchars($cliente['Codigo_Postal']); ?></p>
        <p><strong>País:</strong> <?php echo htmlspecialchars($cliente['Pais']); ?></p>
        <a href="ClientesController.php?opcion=editar" class="button">Editar Información</a>
    </div>

    <div class="ordenes-info">
        <h2>Detalles de las Órdenes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Orden Detalles</th>
                    <th>ID Orden</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordenes as $orden): ?>
                <tr>
                    <td><?php echo htmlspecialchars($orden['ID_OrdenDetalles']); ?></td>
                    <td><?php echo htmlspecialchars($orden['ID_Orden']); ?></td>
                    <td><?php echo htmlspecialchars($orden['producto_nombre']); ?></td>
                    <td><?php echo htmlspecialchars($orden['Cantidad']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../views/templates/footer.php'; ?>