<?php include '../views/templates/header.php'; ?>
    <div class="text">
    <h1>PROVEEDORES</h1>
    <a href="ProveedorController.php?opcion=crear" class="button">Agregar proveedor</a>

    <form method="GET" action="ProveedorController.php" class="search">
        <input type="hidden" name="opcion" value="listar">
        <input type="text" name="search" placeholder="Buscar proveedores" value="<?= htmlentities($search) ?>">
        <button type="submit" class="search-button">Buscar</button>
    </form>

    <link rel="stylesheet" type="text/css" href="admin/assets/css/table.css">
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Código Postal</th>
            <th>País</th>
            <th>Celular</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($proveedores)): ?>
            <?php foreach ($proveedores as $proveedor): ?>
                <tr>
                    <td><?= $proveedor['ID_Proveedor'] ?></td>
                    <td><?= $proveedor['Nombre_Proveedor'] ?></td>
                    <td><?= $proveedor['Nombre_Contacto'] ?></td>
                    <td><?= $proveedor['Direccion'] ?></td>
                    <td><?= $proveedor['Ciudad'] ?></td>
                    <td><?= $proveedor['Codigo_Postal'] ?></td>
                    <td><?= $proveedor['Pais'] ?></td>
                    <td><?= $proveedor['Celular'] ?></td>
                    <td class="acciones">
                        <a href="ProveedorController.php?opcion=editar&id=<?= $proveedor['ID_Proveedor'] ?>" class="botones">Editar</a> | 
                        <a href="ProveedorController.php?opcion=eliminar&id=<?= $proveedor['ID_Proveedor'] ?>" onclick="return confirm('¿Estás seguro?')" class="botones">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="9" class="no-results">No hay proveedores</td></tr>
        <?php endif; ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?opcion=listar&page=<?= $i ?>&search=<?= htmlentities($search) ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>
