<?php
require_once 'db.php';

class Ordenes {
    private $conn;

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->getConexion();
    }

    public function crearOrden($id_cliente, $id_empleado, $fecha_orden, $id_conductor) {
        $query = "INSERT INTO Ordenes (ID_Cliente, ID_Empleado, Fecha_Orden, ID_Conductor) 
                  VALUES (?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iisi", $id_cliente, $id_empleado, $fecha_orden, $id_conductor);

        if ($stmt->execute()) {
            $id_orden = $stmt->insert_id;

            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $query = "INSERT INTO OrdenDetalles (ID_Orden, ID_Libro, Cantidad) 
                          VALUES (?, ?, ?)";
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param("iii", $id_orden, $product_id, $quantity);
                $stmt->execute();
            }

            return true;
        } else {
            return false; 
        }
    }
}
?>
