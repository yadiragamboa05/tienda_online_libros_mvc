<?php include '../views/templates/header.php'; ?>
<div class="text">
    <h1>ORDEN DETALLES</h1>
    <a href="OrdenDetalleController.php?opcion=crear" class="button">Agregar detalles de Orden</a>

    <form method="GET" action="OrdenDetalleController.php" class="search">
        <input type="hidden" name="opcion" value="listar">
        <input type="text" name="search" placeholder="Buscar orden detalle" value="<?= htmlentities($search) ?>">
        <button type="submit" class="search-button">Buscar</button>
    </form>
    
    <table>
        <tr>
            <th>ID</th>
            <th>ID Orden</th>
            <th>ID Producto</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($ordenDetalles)): ?>
            <?php foreach ($ordenDetalles as $ordenDetalle): ?>
                <tr>
                    <td><?= $ordenDetalle['ID_OrdenDetalles']?></td>
                    <td><?= $ordenDetalle['ID_Orden']. " - ".  $ordenDetalle['Nombre_Cliente']?></td>
                    <td><?= $ordenDetalle['ID_Libro']. " - ".  $ordenDetalle['Nombre_Libro'] ?></td>
                    <td><?= $ordenDetalle['Cantidad'] ?></td>
                    <td class="acciones">
                        <a href="OrdenDetalleController.php?opcion=editar&id=<?= $ordenDetalle['ID_OrdenDetalles'] ?>" class="botones">Editar</a> | 
                        <a href="OrdenDetalleController.php?opcion=eliminar&id=<?= $ordenDetalle['ID_OrdenDetalles'] ?>" onclick="return confirm('¿Estás seguro?')" class="botones">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6" class="no-results">No hay orden detalles</td></tr>
        <?php endif; ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?opcion=listar&page=<?= $i ?>&search=<?= htmlentities($search) ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>
