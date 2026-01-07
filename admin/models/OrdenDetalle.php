<?php
include 'db.php';

class OrdenDetalle {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->getConexion();
    }

    public function listar($search = '', $limit = 10, $offset = 0) {
        $sql = "SELECT SQL_CALC_FOUND_ROWS OrdenDetalles.ID_OrdenDetalles, OrdenDetalles.ID_Orden, OrdenDetalles.ID_Libro, OrdenDetalles.Cantidad,
        Productos.Titulo AS Nombre_Libro,
        Clientes.Nombre_Cliente
        FROM OrdenDetalles
        JOIN Productos ON OrdenDetalles.ID_Libro = Productos.ID_Libro
        JOIN Ordenes ON OrdenDetalles.ID_Orden = Ordenes.ID_Orden
        JOIN Clientes ON Ordenes.ID_Cliente = Clientes.ID_Cliente
        WHERE OrdenDetalles.ID_Orden LIKE ? OR OrdenDetalles.ID_Libro LIKE ? OR Productos.titulo LIKE ? OR Clientes.Nombre_Cliente LIKE ?
        LIMIT ? OFFSET ?";

        $stmt = $this->conn->prepare($sql);
        $searchParam = "%$search%";
        $stmt->bind_param('ssssii', $searchParam, $searchParam, $searchParam, $searchParam, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        $ordenDetalles = [];
        while ($row = $result->fetch_assoc()) {
            $ordenDetalles[] = $row;
        }

        $stmt->close();
        
        $resultTotal = $this->conn->query("SELECT FOUND_ROWS() as total");
        $totalRows = $resultTotal->fetch_assoc()['total'];

        return ['ordenDetalles' => $ordenDetalles, 'total' => $totalRows];
    }


    public function crear($id_orden, $id_libro, $cantidad) {
        $sql = "INSERT INTO OrdenDetalles (ID_Orden, ID_Libro, Cantidad) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iii', $id_orden, $id_libro, $cantidad);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM OrdenDetalles WHERE ID_OrdenDetalles = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function actualizar($id, $id_orden, $id_libro, $cantidad) {
        $sql = "UPDATE OrdenDetalles SET 
                ID_Orden = ?, 
                ID_Libro = ?, 
                Cantidad = ? 
                WHERE ID_OrdenDetalles = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iiii', $id_orden, $id_libro, $cantidad, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function eliminar($id) {
        $sql = "DELETE FROM OrdenDetalles WHERE ID_OrdenDetalles = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
?>
