<?php

// Carga la librería PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/vendor/autoload.php';
// require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
// require_once __DIR__ . '/phpmailer/src/SMTP.php';
// require_once __DIR__ . '/phpmailer/src/Exception.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurar el servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Cambiar por el servidor SMTP que desees utilizar
    $mail->SMTPAuth = true;
    $mail->Username = 'stivensasa12@gmail.com'; // Cambiar por tu correo electrónico
    $mail->Password = 'vzte hepd nyjz ydco'; // Cambiar por tu contraseña
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);

    // Configurar el mensaje
    $mail->setFrom('greentreegreen7@gmail.com','GT'); // Cambiar por tu correo electrónico y tu nombre
    $mail->addAddress($correo, $nombre); // Cambiar por el correo electrónico y el nombre del destinatario
    $mail->Subject = $asunto;
    $mail->Body = $mensaje;

    // Enviar el correo electrónico
    $mail->send();
    echo '<body style="display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    font-family: Arial, sans-serif;
    background: #9bcbff;
    color: #6b6b6b;"> <h1>El mensaje se envió correctamente </h1>
    <p>Revisa tu correo, o verifica al destinatario</p>
    </body>';
} catch (Exception $e) {
    echo 'Error al enviar el mensaje: ', $mail->ErrorInfo;
}


?>