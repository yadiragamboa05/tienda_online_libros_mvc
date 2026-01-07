<?php
include 'db.php';

class Conductor {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->getConexion();
    }

    public function listar($search = '', $limit = 10, $offset = 0) {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Conductores WHERE Nombre_Conductor LIKE ? OR Celular LIKE ? LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $searchParam = "%$search%";
        $stmt->bind_param('ssii', $searchParam, $searchParam, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $conductores = [];
        while ($row = $result->fetch_assoc()) {
            $conductores[] = $row;
        }

        $stmt->close();

        $resultTotal = $this->conn->query("SELECT FOUND_ROWS() as total");
        $totalRows = $resultTotal->fetch_assoc()['total'];

        return ['conductores' => $conductores, 'total' => $totalRows];
    }


    public function crear($nombre, $celular) {
        $sql = "INSERT INTO Conductores (Nombre_Conductor, Celular) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $nombre, $celular);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM Conductores WHERE ID_Conductor = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function actualizar($id, $nombre, $celular) {
        $sql = "UPDATE Conductores SET Nombre_Conductor = ?, Celular = ? WHERE ID_Conductor = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssi', $nombre, $celular, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM Conductores WHERE ID_Conductor = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>