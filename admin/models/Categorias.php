<?php
include 'db.php';

class Categorias {
    private $conn;

    public function __construct() {
        $this->conn = (new Conexion())->getConexion();
    }

    public function listar($search = '', $limit = 10, $offset = 0) {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Categorias WHERE Nombre_Categoria LIKE ? OR Descripcion LIKE ? LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $searchParam = "%$search%";
        $stmt->bind_param('ssii', $searchParam, $searchParam, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $categorias = [];
        while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
        }

        $stmt->close();
    
        $resultTotal = $this->conn->query("SELECT FOUND_ROWS() as total");
        $totalRows = $resultTotal->fetch_assoc()['total'];

        return ['categorias' => $categorias, 'total' => $totalRows];
    }


    public function obtener($id) {
        $sql = "SELECT * FROM Categorias WHERE ID_Categoria = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $categoria = $result->fetch_assoc();
        $stmt->close();

        return $categoria;
    }

    public function crear($nombre, $descripcion) {
        $sql = "INSERT INTO Categorias (Nombre_Categoria, Descripcion) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $nombre, $descripcion);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function actualizar($id, $nombre, $descripcion) {
        $sql = "UPDATE Categorias SET Nombre_Categoria = ?, Descripcion = ? WHERE ID_Categoria = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssi', $nombre, $descripcion, $id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM Categorias WHERE ID_Categoria = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
}
?>
