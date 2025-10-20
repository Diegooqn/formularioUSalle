<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once("../config/database.php");

$database = new Database();
$conn = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));

    // Normalizar/sanear
    $nombre  = isset($data->nombre)  ? trim($data->nombre)  : '';
    $email   = isset($data->email)   ? trim($data->email)   : '';
    $asunto  = isset($data->asunto)  ? trim($data->asunto)  : '';
    $mensaje = isset($data->mensaje) ? trim($data->mensaje) : '';

    // Reglas (coinciden con tu informe)
    $errores = [];
    if ($nombre === '' || mb_strlen($nombre) < 3)  $errores[] = "El nombre debe tener mínimo 3 caracteres.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = "Correo electrónico inválido.";
    if ($asunto === '' || mb_strlen($asunto) < 5) $errores[] = "El asunto debe tener mínimo 5 caracteres.";
    if (mb_strlen($mensaje) < 10 || mb_strlen($mensaje) > 1000) $errores[] = "El mensaje debe tener entre 10 y 1000 caracteres.";

    if ($errores) {
        http_response_code(422);
        echo json_encode(["message" => "Validación fallida", "errors" => $errores]);
        exit;
    }

    $query = "INSERT INTO contactos (nombre, email, asunto, mensaje) 
              VALUES (:nombre, :email, :asunto, :mensaje)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":email",  $email);
    $stmt->bindParam(":asunto", $asunto);
    $stmt->bindParam(":mensaje",$mensaje);

    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(["message" => "Contacto guardado correctamente."]);
    } else {
        http_response_code(503);
        echo json_encode(["message" => "Error al guardar el contacto."]);
    }
}
?>