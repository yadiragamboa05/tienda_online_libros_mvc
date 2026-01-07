<?php
include 'db.php';

class Proveedor {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->getConexion();
    }

    public function listar($search = '', $limit = 10, $offset = 0) {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Proveedores WHERE Nombre_Proveedor LIKE ? OR Nombre_Contacto LIKE ? LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $searchParam = "%$search%";
        $stmt->bind_param('ssii', $searchParam, $searchParam, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $proveedores = [];
        while ($row = $result->fetch_assoc()) {
            $proveedores[] = $row;
    }

        $stmt->close();

        $resultTotal = $this->conn->query("SELECT FOUND_ROWS() as total");
        $totalRows = $resultTotal->fetch_assoc()['total'];

        return ['proveedores' => $proveedores, 'total' => $totalRows];
    }


    public function crear($nombre, $contacto, $direccion, $ciudad, $codigo_postal, $pais, $celular) {
        $sql = "INSERT INTO Proveedores (Nombre_Proveedor, Nombre_Contacto, Direccion, Ciudad, Codigo_Postal, Pais, Celular) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssssss', $nombre, $contacto, $direccion, $ciudad, $codigo_postal, $pais, $celular);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM Proveedores WHERE ID_Proveedor = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function actualizar($id, $nombre, $contacto, $direccion, $ciudad, $codigo_postal, $pais, $celular) {
        $sql = "UPDATE Proveedores SET 
                Nombre_Proveedor = ?, 
                Nombre_Contacto = ?, 
                Direccion = ?, 
                Ciudad = ?, 
                Codigo_Postal = ?, 
                Pais = ?, 
                Celular = ? 
                WHERE ID_Proveedor = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssssssi', $nombre, $contacto, $direccion, $ciudad, $codigo_postal, $pais, $celular, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM Proveedores WHERE ID_Proveedor = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>
