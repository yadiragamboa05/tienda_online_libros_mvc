<?php
include 'db.php';

class Cliente {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->getConexion();
    }

    public function listar($search = '', $limit = 10, $offset = 0) {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Clientes WHERE Nombre_Cliente LIKE ? OR Nombre_Contacto LIKE ? OR Pais LIKE ? OR Ciudad LIKE ? OR Direccion LIKE ? OR Codigo_Postal LIKE ? LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $searchParam = "%$search%";
        $stmt->bind_param('ssssssii', $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $clientes = [];
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }

        $stmt->close();
    
        $resultTotal = $this->conn->query("SELECT FOUND_ROWS() as total");
        $totalRows = $resultTotal->fetch_assoc()['total'];

        return ['clientes' => $clientes, 'total' => $totalRows];
    }

    public function crear($nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais) {
        $sql = "INSERT INTO Clientes (Nombre_Cliente, Nombre_Contacto, Direccion, Ciudad, Codigo_Postal, Pais) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssssss', $nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM Clientes WHERE ID_Cliente = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function actualizar($id, $nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais) {
        $sql = "UPDATE Clientes SET Nombre_Cliente=?, Nombre_Contacto=?, Direccion=?, Ciudad=?, Codigo_Postal=?, Pais=? WHERE ID_Cliente=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssssssi', $nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM Clientes WHERE ID_Cliente = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>
