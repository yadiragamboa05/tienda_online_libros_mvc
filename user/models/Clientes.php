<?php
include 'db.php';

class Cliente {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->getConexion();
    }

    public function getClienteById($id) {
        $sql = "SELECT * FROM clientes WHERE ID_Cliente = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function updateCliente($id, $nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais) {
        $sql = "UPDATE clientes SET Nombre_Cliente = ?, Nombre_Contacto = ?, Direccion = ?, Ciudad = ?, Codigo_Postal = ?, Pais = ? WHERE ID_Cliente = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssi", $nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais, $id);
        $stmt->execute();
    }

    public function registrarCliente($id, $nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais) {
        $sql = "INSERT INTO clientes (ID_Cliente, Nombre_Cliente, Nombre_Contacto, Direccion, Ciudad, Codigo_Postal, Pais) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issssss", $id, $nombre_cliente, $nombre_contacto, $direccion, $ciudad, $codigo_postal, $pais);
        $stmt->execute();
    }

    public function getOrdenesByClienteId($id) {
        $sql = "
            SELECT od.*, p.Titulo AS producto_nombre 
            FROM ordendetalles od
            JOIN productos p ON od.ID_Libro = p.ID_Libro
            WHERE od.ID_Orden IN (
                SELECT ID_Orden FROM ordenes WHERE ID_Cliente = ?
            )";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $ordenes = [];
        while ($row = $result->fetch_assoc()) {
            $ordenes[] = $row;
        }

        return $ordenes;
    }
}
?>