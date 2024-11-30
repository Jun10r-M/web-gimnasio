<?php
class Database {
    private $conn;
    private $server = "JUNIOR\SQLEXPRESS"; 
    private $base = "GIMNASIO"; 
    private $username = "sa"; 
    private $password = "123"; 

    public function __construct() {
        $dsn = "sqlsrv:Server={$this->server};Database={$this->base}"; 
        try {
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
            exit; // Salir si hay un error en la conexión
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null; // Cerrar la conexión
    }
}
?>