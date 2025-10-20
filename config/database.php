<?php
/**
 * Configuración de conexión a la base de datos
 * Universidad de la Salle - Formulario de Contacto
 */

class Database {
    // Configuración LOCAL (para desarrollo)
    private $host = "sql213.infinityfree.com";
    private $db_name = "if0_40208130_formulario_usalle";
    private $username = "if0_40208130";
    private $password = "dtILwzXYw3mp";   // <-- esta es la que pusiste al crear la cuenta
    private $charset = "utf8mb4";
    
    public $conn;
    
    /**
     * Establece la conexión con la base de datos
     * @return PDO|null
     */
    public function getConnection() {
        $this->conn = null;
        
        try {
            $dsn = "mysql:host=" . $this->host . 
                   ";dbname=" . $this->db_name . 
                   ";charset=" . $this->charset;
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            
        } catch(PDOException $e) {
            error_log("Error de conexión: " . $e->getMessage());
            return null;
        }
        
        return $this->conn;
    }
    
    /**
     * Cierra la conexión a la base de datos
     */
    public function closeConnection() {
        $this->conn = null;
    }
    
    /**
     * Verifica si la conexión está activa
     * @return bool
     */
    public function isConnected() {
        return $this->conn !== null;
    }
}

// Configuración para manejo de errores
ini_set('display_errors', 0);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/php-errors.log');
?>