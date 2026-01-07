<?php
include 'db.php';

class Order {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->getConexion();
    }

    public function listar($search = '', $limit = 10, $offset = 0) {
        $sql = "SELECT SQL_CALC_FOUND_ROWS Ordenes.ID_Orden, Ordenes.ID_Cliente, Clientes.Nombre_Cliente, Ordenes.ID_Empleado, Empleados.Nombres AS Nombre_Empleado, Empleados.Apellidos AS Apellido_Empleado, Ordenes.ID_Conductor, Conductores.Nombre_Conductor, Ordenes.Fecha_Orden, Ordenes.Estado
            FROM Ordenes
            JOIN Clientes ON Ordenes.ID_Cliente = Clientes.ID_Cliente
            JOIN Empleados ON Ordenes.ID_Empleado = Empleados.ID_Empleado
            JOIN Conductores ON Ordenes.ID_Conductor = Conductores.ID_Conductor
            WHERE Ordenes.ID_Orden LIKE ? OR Ordenes.ID_Cliente LIKE ? OR Clientes.Nombre_Cliente LIKE ? OR Empleados.Nombres LIKE ? OR Empleados.Apellidos LIKE ? OR Conductores.Nombre_Conductor LIKE ?
            LIMIT ? OFFSET ?";
        $stmt = $this->conn->prepare($sql);
        $searchParam = "%$search%";
        $stmt->bind_param('ssssssii', $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $ordenes = [];
        while ($row = $result->fetch_assoc()) {
           $ordenes[] = $row;
        }

        $stmt->close();

        $resultTotal = $this->conn->query("SELECT FOUND_ROWS() as total");
        $totalRows = $resultTotal->fetch_assoc()['total'];

        return ['ordenes' => $ordenes, 'total' => $totalRows];
    }


    public function crear($id_cliente, $id_empleado, $fecha_orden, $id_conductor) {
        $sql = "INSERT INTO Ordenes (ID_Cliente, ID_Empleado, Fecha_Orden, ID_Conductor) 
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iisi', $id_cliente, $id_empleado, $fecha_orden, $id_conductor);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM Ordenes WHERE ID_Orden = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function actualizar($id, $id_cliente, $id_empleado, $fecha_orden, $id_conductor) {
        $sql = "UPDATE Ordenes SET 
                ID_Cliente = ?, 
                ID_Empleado = ?, 
                Fecha_Orden = ?, 
                ID_Conductor = ? 
                WHERE ID_Orden = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iisii', $id_cliente, $id_empleado, $fecha_orden, $id_conductor, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM Ordenes WHERE ID_Orden = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>
