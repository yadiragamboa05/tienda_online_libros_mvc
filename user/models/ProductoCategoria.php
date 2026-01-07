<?php

include 'db.php';

class Producto {
    private $conn;

    public function __construct() {
        $conexion = new Conexion();
        $this->conn = $conexion->getConexion();
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM Productos WHERE ID_Libro = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function obtenerPorCategoria($categoriaId) {
        $sql = "SELECT * FROM Productos WHERE ID_Categoria = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $categoriaId);
        $stmt->execute();
        $result = $stmt->get_result();
        $productos = [];
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
        return $productos;
    }
}

?>
