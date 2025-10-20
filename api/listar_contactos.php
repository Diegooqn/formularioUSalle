<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once("../config/database.php");

$database = new Database();
$conn = $database->getConnection();

$query = "SELECT id, nombre, email, asunto, mensaje, fecha_envio FROM contactos ORDER BY fecha_envio DESC";
$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>