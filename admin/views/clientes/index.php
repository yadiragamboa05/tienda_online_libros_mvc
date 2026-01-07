<?php include '../views/templates/header.php'; ?>
<div class="text">
    <h1>CLIENTES</h1><br>
    <a href="ClientesController.php?opcion=crear" class="button">Agregar Cliente</a>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="ClientesController.php" class="search">
        <input type="hidden" name="opcion" value="listar">
        <input type="text" name="search" placeholder="Buscar cliente" value="<?= htmlentities($search) ?>">
        <button type="submit" class="search-button">Buscar</button>
    </form>
    
    <table>
        <tr>
            <th>ID Cliente</th>
            <th>Nombre Cliente</th>
            <th>País</th>
            <th>Nombre Contacto</th>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Código Postal</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($clientes)): ?>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente['ID_Cliente'] ?></td>
                    <td><?= $cliente['Nombre_Cliente'] ?></td>
                    <td><?= $cliente['Pais'] ?></td>
                    <td><?= $cliente['Nombre_Contacto'] ?></td>
                    <td><?= $cliente['Direccion'] ?></td>
                    <td><?= $cliente['Ciudad'] ?></td>
                    <td><?= $cliente['Codigo_Postal'] ?></td>
                    <td class="acciones">
                        <a href="ClientesController.php?opcion=editar&id=<?= $cliente['ID_Cliente'] ?>" class="botones">Editar</a> | 
                        <a href="ClientesController.php?opcion=eliminar&id=<?= $cliente['ID_Cliente'] ?>" onclick="return confirm('¿Estás seguro?')" class="botones">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="8" class="no-results">No hay clientes</td></tr>
        <?php endif; ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?opcion=listar&page=<?= $i ?>&search=<?= htmlentities($search) ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>
