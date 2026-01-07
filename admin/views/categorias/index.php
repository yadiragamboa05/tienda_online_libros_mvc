<?php include '../views/templates/header.php'; ?>
<div class="text">
    <h1>CATEGORÍAS</h1>
    <a href="../controllers/CategoriasController.php?opcion=crear" class="button">Agregar Categoria</a>

    <form method="GET" action="../controllers/CategoriasController.php" class="search">
        <input type="hidden" name="opcion" value="listar">
        <input type="text" name="search" placeholder="Buscar categorías">
        <button type="submit" class="search-button">Buscar</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria['ID_Categoria'] ?></td>
                <td><?= $categoria['Nombre_Categoria'] ?></td>
                <td><?= $categoria['Descripcion'] ?></td>
                <td class='acciones'>
                    <a href='../controllers/CategoriasController.php?opcion=editar&id=<?= $categoria['ID_Categoria'] ?>' class='botones'>Editar</a> | 
                    <a href='../controllers/CategoriasController.php?opcion=eliminar&id=<?= $categoria['ID_Categoria'] ?>' onclick='return confirm("¿Estás seguro?")' class='botones'>Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?opcion=listar&page=<?= $i ?>&search=<?= htmlentities($search) ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>

