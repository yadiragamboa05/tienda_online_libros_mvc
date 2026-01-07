<?php include '../views/templates/header.php'; ?>
    <div class="text">
    <h1>EMPLEADOS</h1>
    <a href="EmpleadosController.php?opcion=crear" class="button">Agregar empleado</a>

    <form method="GET" action="EmpleadosController.php" class="search">
        <input type="hidden" name="opcion" value="listar">
        <input type="text" name="search" placeholder="Buscar empleados" value="<?= htmlentities($search) ?>">
        <button type="submit" class="search-button">Buscar</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Fecha de Nacimiento</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($empleados)): ?>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?= $empleado['ID_Empleado'] ?></td>
                    <td><?= $empleado['Apellidos'] ?></td>
                    <td><?= $empleado['Nombres'] ?></td>
                    <td><?= $empleado['Fecha_de_nacimiento'] ?></td>
                    <td><?= $empleado['Descripción'] ?></td>
                    <td class="acciones">
                        <a href="EmpleadosController.php?opcion=editar&id=<?= $empleado['ID_Empleado'] ?>" class="botones">Editar</a> | 
                        <a href="EmpleadosController.php?opcion=eliminar&id=<?= $empleado['ID_Empleado'] ?>" onclick="return confirm('¿Estás seguro?')" class="botones">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6" class="no-results">No hay empleados</td></tr>
        <?php endif; ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?opcion=listar&page=<?= $i ?>&search=<?= htmlentities($search) ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>
