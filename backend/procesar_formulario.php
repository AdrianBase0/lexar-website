<?php
/**
 * Advance Lexar - Endpoint de Formulario Contacto
 * Implementación REAL con Envío SMTP mediante PHPMailer.
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

// 1. CARGAR CONFIGURACIÓN Y DEPENDENCIAS
$configPath = __DIR__ . '/config.php';
if (!file_exists($configPath)) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Error de servidor: No se encuentra el archivo de configuración SMTP."]);
    exit;
}

require_once $configPath;
require_once __DIR__ . '/PHPMailer/Exception.php';
require_once __DIR__ . '/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 2. VERIFICAR HONEYPOT (Re-validación severa de backend)
$trapBot = $_POST['trap_bot'] ?? '';
if (!empty($trapBot)) {
    http_response_code(400);
    echo json_encode(["status" => "success", "message" => "Mensaje recibido."]); // Engaño al bot
    exit;
}

// 3. RECIBIR Y SANITIZAR VARIABLES 
$rawName    = trim($_POST['full_name'] ?? '');
$rawEmail   = trim($_POST['corporate_email'] ?? '');
$rawSubject = trim($_POST['subject'] ?? '');
$rawMsg     = trim($_POST['consult_message'] ?? '');
$privacy    = isset($_POST['privacy_policy']) ? true : false;

$cleanName    = htmlspecialchars(strip_tags($rawName), ENT_QUOTES, 'UTF-8');
$cleanEmail   = filter_var($rawEmail, FILTER_SANITIZE_EMAIL);
$cleanSubject = htmlspecialchars(strip_tags($rawSubject), ENT_QUOTES, 'UTF-8');
$cleanMsg     = htmlspecialchars(strip_tags($rawMsg), ENT_QUOTES, 'UTF-8');

// Traducir slug del asunto a texto legible
$subjectsMap = [
    'legal' => 'Consultoría Legal y Compliance',
    'economica' => 'Consultoría Estratégica y Económica',
    'inmobiliaria' => 'Gestión Inmobiliaria',
    'otros' => 'Otras Consultas'
];
$subjectLabel = $subjectsMap[$cleanSubject] ?? 'Consulta General';

// 4. RE-VALIDACIONES DE BACKEND
if (empty($cleanName) || empty($cleanEmail) || empty($cleanSubject) || empty($cleanMsg)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Faltan campos obligatorios en el servidor."]);
    exit;
}

if (!filter_var($cleanEmail, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "El correo electrónico aportado no es válido."]);
    exit;
}

if (!$privacy) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Debe aceptar la política de privacidad."]);
    exit;
}

// 5. FLUJO DE ENVÍO SMTP
$mail = new PHPMailer(true);

try {
    // a) Configuración del Servidor
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = (SMTP_SECURE === 'tls') ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = SMTP_PORT;
    $mail->CharSet    = 'UTF-8';

    // b) PRIMER ENVÍO: Notificación a Advance Lexar (Lead)
    $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
    $mail->addAddress(MAIL_TO_CORPORATE);
    $mail->addReplyTo($cleanEmail, $cleanName);

    $mail->isHTML(true);
    $mail->Subject = "Nuevo Lead: $subjectLabel - $cleanName";
    
    $body = "<h2>Nueva solicitud de contacto desde la web</h2>";
    $body .= "<p><strong>Nombre:</strong> $cleanName</p>";
    $body .= "<p><strong>Email:</strong> $cleanEmail</p>";
    $body .= "<p><strong>Área de interés:</strong> $subjectLabel</p>";
    $body .= "<p><strong>Mensaje:</strong><br>" . nl2br($cleanMsg) . "</p>";
    $body .= "<hr><p>Este mensaje ha sido enviado desde el formulario oficial de Advance Lexar.</p>";

    $mail->Body = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();

    // c) SEGUNDO ENVÍO: Autorespondedor al Cliente
    $mail->clearAddresses();
    $mail->clearReplyTos();
    $mail->addAddress($cleanEmail, $cleanName);
    
    $mail->Subject = "Confirmación de solicitud | Advance Lexar";
    
    $autoBody = "<p>Estimado/a <strong>$cleanName</strong>,</p>";
    $autoBody .= "<p>Hemos recibido correctamente su solicitud de contacto referente a <strong>$subjectLabel</strong>.</p>";
    $autoBody .= "<p>Nuestros consultores están evaluando minuciosamente su caso y le daremos una respuesta formal en un plazo de 24/48 horas operativas.</p>";
    $autoBody .= "<p>Gracias por confiar en el rigor y la excelencia de Advance Lexar.</p>";
    $autoBody .= "<br><p>Atentamente,<br><strong>Equipo de Consultoría de Advance Lexar</strong></p>";

    $mail->Body = $autoBody;
    $mail->AltBody = strip_tags($autoBody);

    $mail->send();

    // d) Éxito final
    echo json_encode([
        "status" => "success", 
        "message" => "Su comunicado ha sido enviado con éxito. En breve recibirá una confirmación en su correo electrónico."
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "status" => "error", 
        "message" => "Error técnico al procesar el envío. Por favor, contacte directamente con info@advancelexar.com"
    ]);
}
?>
