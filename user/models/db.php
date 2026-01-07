<?php
class Conexion {
    private $servername = "localhost";
    private $username = "root";
    private $password = ""; // Aquí debe ser $password en lugar de $pass
    private $dbname = "negociosdb";

    public $conn;
    
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function getConexion() {
        return $this->conn;
    }
}
?>
