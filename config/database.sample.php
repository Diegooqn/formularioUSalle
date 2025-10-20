<?php
/**
 * Plantilla de conexión (copiar a config/database.php y ajustar)
 */
class Database {
    private $host = "localhost";
    private $db_name = "formulario_usalle";
    private $username = "root";
    private $password = "";
    private $charset = "utf8mb4";

    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$this->charset}";
            $opts = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->conn = new PDO($dsn, $this->username, $this->password, $opts);
        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            return null;
        }
        return $this->conn;
    }
}
