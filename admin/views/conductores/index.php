<?php include '../views/templates/header.php'; ?>
    <div class="text">
    <h1>CONDUCTORES</h1>
    <a href="ConductoresController.php?opcion=crear" class="button">Agregar conductor</a>

    <form method="GET" action="ConductoresController.php" class="search">
        <input type="hidden" name="opcion" value="listar">
        <input type="text" name="search" placeholder="Buscar conductores" value="<?= htmlentities($search) ?>">
        <button type="submit" class="search-button">Buscar</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Celular</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($conductores)): ?>
            <?php foreach ($conductores as $conductor): ?>
                <tr>
                    <td><?= $conductor['ID_Conductor'] ?></td>
                    <td><?= $conductor['Nombre_Conductor'] ?></td>
                    <td><?= $conductor['Celular'] ?></td>
                    <td class="acciones">
                        <a href="ConductoresController.php?opcion=editar&id=<?= $conductor['ID_Conductor'] ?>" class="botones">Editar</a> | 
                        <a href="ConductoresController.php?opcion=eliminar&id=<?= $conductor['ID_Conductor'] ?>" onclick="return confirm('¿Estás seguro?')" class="botones">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4" class="no-results">No hay conductores</td></tr>
        <?php endif; ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?opcion=listar&page=<?= $i ?>&search=<?= htmlentities($search) ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>
