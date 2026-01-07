<?php
include 'db.php';

class Empleado {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->getConexion();
    }

    public function listar($search = '', $limit = 10, $offset = 0) {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Empleados WHERE Apellidos LIKE ? OR Nombres LIKE ? LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $searchParam = "%$search%";
        $stmt->bind_param('ssii', $searchParam, $searchParam, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $empleados = [];
        while ($row = $result->fetch_assoc()) {
            $empleados[] = $row;
        }

        $stmt->close();
    
        $resultTotal = $this->conn->query("SELECT FOUND_ROWS() as total");
        $totalRows = $resultTotal->fetch_assoc()['total'];

        return ['empleados' => $empleados, 'total' => $totalRows];
    }


    public function crear($apellidos, $nombres, $fecha_nacimiento, $descripcion) {
        $sql = "INSERT INTO Empleados (Apellidos, Nombres, Fecha_de_nacimiento, Descripción) 
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssss', $apellidos, $nombres, $fecha_nacimiento, $descripcion);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM Empleados WHERE ID_Empleado = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function actualizar($id, $apellidos, $nombres, $fecha_nacimiento, $descripcion) {
        $sql = "UPDATE Empleados SET 
                Apellidos = ?, 
                Nombres = ?, 
                Fecha_de_nacimiento = ?, 
                Descripción = ? 
                WHERE ID_Empleado = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssssi', $apellidos, $nombres, $fecha_nacimiento, $descripcion, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM Empleados WHERE ID_Empleado = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>
