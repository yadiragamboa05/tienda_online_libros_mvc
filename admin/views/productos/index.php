<?php include '../views/templates/header.php'; ?>
<div class="text">
    <h1>LIBROS</h1>
    <a href="../controllers/ProductosController.php?opcion=crear" class="button">Agregar libro</a>

    <form method="GET" action="../controllers/ProductosController.php" class="search">
        <input type="hidden" name="opcion" value="listar">
        <input type="text" name="search" placeholder="Buscar libros">
        <button type="submit" class="search-button">Buscar</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Proveedor</th>
            <th>Categoría</th>
            <th>Editorial</th>
            <th>Fecha de Publicación</th>
            <th>Número de Páginas</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php
        if (!empty($productos)) {
            foreach ($productos as $row) {
                echo "<tr>
                    <td>{$row['ID_Libro']}</td>
                    <td>{$row['Titulo']}</td>
                    <td>{$row['Autor']}</td>
                    <td>{$row['ISBN']}</td>
                    <td>{$row['ID_Proveedor']} - {$row['Nombre_Proveedor']}</td>
                    <td>{$row['ID_Categoria']} - {$row['Nombre_Categoria']}</td>
                    <td>{$row['Editorial']}</td>
                    <td>{$row['Fecha_Publicacion']}</td>
                    <td>{$row['Num_Paginas']}</td>
                    <td><img src='{$row['Link_Imagen']}' alt='{$row['Titulo']}' width='100'></td>
                    <td>{$row['Precio']}</td>
                    <td>{$row['Stock']}</td>
                    <td class='acciones'>
                        <a href='../controllers/ProductosController.php?opcion=editar&id={$row['ID_Libro']}' class='botones'>Editar</a> | 
                        <a href='../controllers/ProductosController.php?opcion=eliminar&id={$row['ID_Libro']}' onclick='return confirm(\"¿Estás seguro?\")' class='botones'>Eliminar</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='13' class='no-results'>No hay libros</td></tr>";
        }
        ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?opcion=listar&page=<?php echo $i; ?>&search=<?php echo $search; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
</div>
<?php include '../views/templates/footer.php'; ?>
