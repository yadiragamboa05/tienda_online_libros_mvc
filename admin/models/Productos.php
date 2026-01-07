<?php
include 'db.php';

class Productos {
    private $conn;

    public function __construct() {
        $this->conn = (new Conexion())->getConexion();
    }

    public function listar($search = '', $limit = 15, $offset = 0) {
    $sql = "SELECT 
                l.ID_Libro,
                l.Titulo,
                l.Autor,
                l.ISBN,
                l.ID_Proveedor,
                pr.Nombre_Proveedor,
                l.ID_Categoria,
                c.Nombre_Categoria,
                l.Editorial,
                l.Fecha_Publicacion,
                l.Num_Paginas,
                l.Link_Imagen,
                l.Precio,
                l.Stock
            FROM 
                productos l
            JOIN 
                proveedores pr ON l.ID_Proveedor = pr.ID_Proveedor
            JOIN 
                categorias c ON l.ID_Categoria = c.ID_Categoria
            WHERE 
                l.Titulo LIKE ? OR
                l.Autor LIKE ? OR
                l.ISBN LIKE ?
            ORDER BY 
                l.ID_Libro
            LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $searchParam = "%$search%";
        $stmt->bind_param('sssii', $searchParam, $searchParam, $searchParam, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $productos = [];
        while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
        }
    
        $stmt->close();
        return $productos;
    }

    public function contar($search = '') {
        $sql = "SELECT COUNT(*) AS total FROM productos WHERE Titulo LIKE ? OR Autor LIKE ? OR ISBN LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $searchParam = "%$search%";
        $stmt->bind_param('sss', $searchParam, $searchParam, $searchParam);
        $stmt->execute();
        $result = $stmt->get_result();
        $total = $result->fetch_assoc()['total'];
        $stmt->close();

        return $total;
    }


    public function obtener($id) {
        $sql = "SELECT * FROM productos WHERE ID_Libro = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto = $result->fetch_assoc();
        $stmt->close();

        return $producto;
    }

    public function crear($titulo, $autor, $isbn, $id_proveedor, $id_categoria, $editorial, $fecha_publicacion, $num_paginas, $precio, $stock, $imagen_url) {
        $sql = "INSERT INTO productos (Titulo, Autor, ISBN, ID_Proveedor, ID_Categoria, Editorial, Fecha_Publicacion, Num_Paginas, Precio, Stock, Link_Imagen) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssiissidis', $titulo, $autor, $isbn, $id_proveedor, $id_categoria, $editorial, $fecha_publicacion, $num_paginas, $precio, $stock, $imagen_url);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function actualizar($id, $titulo, $autor, $isbn, $id_proveedor, $id_categoria, $editorial, $fecha_publicacion, $num_paginas, $precio, $stock, $imagen_url) {
        $sql = "UPDATE productos SET Titulo = ?, Autor = ?, ISBN = ?, ID_Proveedor = ?, ID_Categoria = ?, Editorial = ?, Fecha_Publicacion = ?, Num_Paginas = ?, Precio = ?, Stock = ?, Link_Imagen = ? 
                WHERE ID_Libro = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssiissidisi', $titulo, $autor, $isbn, $id_proveedor, $id_categoria, $editorial, $fecha_publicacion, $num_paginas, $precio, $stock, $imagen_url, $id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE ID_Libro = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
}
?>
