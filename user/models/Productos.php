<?php
include 'db.php';

class Producto {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->getConexion();
    }

    public function listarProductos() {
        $sql = "SELECT * FROM Productos";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM Productos WHERE ID_Libro = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function obtenerPorCategoria($categoriaId) {
        $sql = "SELECT * FROM Productos WHERE ID_Categoria = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $categoriaId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function buscarProductos($query) {
        $sql = "SELECT * FROM Productos WHERE Titulo LIKE ? OR Autor LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $likeQuery = "%$query%";
        $stmt->bind_param("ss", $likeQuery, $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
