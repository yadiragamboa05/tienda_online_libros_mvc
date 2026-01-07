<?php include '../views/templates/header.php'; ?>
    <div class="text">
    <h1>ÓRDENES</h1>
    <a href="OrderController.php?opcion=crear" class="button">Agregar orden</a>

    <form method="GET" action="OrderController.php" class="search">
        <input type="hidden" name="opcion" value="listar">
        <input type="text" name="search" placeholder="Buscar órdenes" value="<?= htmlentities($search) ?>">
        <button type="submit" class="search-button">Buscar</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Empleado</th>
            <th>Fecha de Orden</th>
            <th>Conductor</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($ordenes)): ?>
            <?php foreach ($ordenes as $orden): ?>
                <tr>
                    <td><?= $orden['ID_Orden'] ?></td>
                    <td><?= $orden['ID_Cliente']." - ".$orden['Nombre_Cliente']?></td>
                    <td><?= $orden['ID_Empleado']." - ".  $orden['Nombre_Empleado']?></td>
                    <td><?= $orden['Fecha_Orden'] ?></td>
                    <td><?= $orden['ID_Conductor']." - ".  $orden['Nombre_Conductor'] ?></td>
                    <td class="acciones">
                        <a href="OrderController.php?opcion=editar&id=<?= $orden['ID_Orden'] ?>" class="botones">Editar</a> | 
                        <a href="OrderController.php?opcion=eliminar&id=<?= $orden['ID_Orden'] ?>" onclick="return confirm('¿Estás seguro?')" class="botones">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6" class="no-results">No hay órdenes</td></tr>
        <?php endif; ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?opcion=listar&page=<?= $i ?>&search=<?= htmlentities($search) ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>