<?php
/**
 * Advance Lexar - Endpoint de Formulario Contacto
 * Mock Backend (Validación Real sin Envío SMTP para entorno de pruebas)
 */

declare(strict_types=1);

// Retornar JSON puro
header('Content-Type: application/json; charset=utf-8');

// Solo method POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Método no permitido."]);
    exit;
}

// 1. VERIFICAR HONEYPOT (Re-validación severa de backend)
$trapBot = $_POST['trap_bot'] ?? '';
if (!empty($trapBot)) {
    http_response_code(400);
    // Fake success to fool bots
    echo json_encode(["status" => "success", "message" => "Mensaje recibido."]);
    exit;
}

// 2. RECIBIR Y SANITIZAR VARIABLES 
// Evitar XSS (Cross Site Scripting) limpiando etiquetas HTML ocultas o scripts.
$rawName    = trim($_POST['full_name'] ?? '');
$rawEmail   = trim($_POST['email_address'] ?? '');
$rawSubject = trim($_POST['subject'] ?? '');
$rawMsg     = trim($_POST['consult_message'] ?? '');
$privacy    = isset($_POST['privacy_policy']) ? true : false;

$cleanName    = htmlspecialchars(strip_tags($rawName), ENT_QUOTES, 'UTF-8');
$cleanEmail   = filter_var($rawEmail, FILTER_SANITIZE_EMAIL);
$cleanSubject = htmlspecialchars(strip_tags($rawSubject), ENT_QUOTES, 'UTF-8');
$cleanMsg     = htmlspecialchars(strip_tags($rawMsg), ENT_QUOTES, 'UTF-8');

// 3. RE-VALIDACIONES DE BACKEND (Para peticiones trucadas sin JS)
if (empty($cleanName) || empty($cleanEmail) || empty($cleanSubject) || empty($cleanMsg)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Faltan campos obligatorios. Revise su formulario."]);
    exit;
}

if (!filter_var($cleanEmail, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "El formato del correo aportado al servidor es inválido."]);
    exit;
}

if (!$privacy) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "No ha aceptado formalmente la política de privacidad."]);
    exit;
}

// ============================================
// LÓGICA DE ENVÍO SMTP (Mocked out / Comentada)
// ============================================

/*
require 'config/env.php'; // Secret keys importadas sin subir a GIT
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST; // ej. smtp.ionos.es
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // ... lógica dual email advance lexar + autoresponder cliente
    // $mail->send();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error SMTP: " . $mail->ErrorInfo]);
    exit;
}
*/

// Simulación de delay de RED (1.5s) para mostrar la animación UI "Procesando..."
usleep(1500000);

// RESPUESTA FINAL DE ÉXITO (MOCK)
http_response_code(200);
echo json_encode([
    "status" => "success", 
    "message" => "MOCK: Validación exitosa. Los datos cifrados de $cleanName han pasado la validación Backend 100%. (El envío SMTP en entorno local está inhabilitado por el momento)."
]);
exit;
