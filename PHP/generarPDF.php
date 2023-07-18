<?php
#Conexion a la BD
include 'conexion.php';

#PHPMailer, fpdf y vendor
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';
require "../fpdf185/fpdf.php";
require "../vendor/autoload.php";

//Datos del usuario
$user = $_GET["user"];
$idUsuario;
$nombre;

$usuario = $con->query("SELECT * FROM usuarios WHERE correo = '$user'");
if ($usuario && $usuario->num_rows > 0) {
    $fila = $usuario->fetch_assoc();
    $idUsuario = $fila['id'];
    $nombre = $fila['nombre'];
}
// Configuración del correo electrónico
$nombreRemitente = 'KSPGames';
$correoRemitente = 'a21110138@ceti.mx';
$nombreDestinatario = $nombre;
$correoDestinatario = $user;
$asunto = 'Resumen de Compra';
$mensaje = 'Gracias por su compra :D';

// Configuración de PHPMailer
$mail = new PHPMailer(true); // Habilita las excepciones de PHPMailer

try {
    // Configuración del servidor SMTP de Google
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'a21110138@gmail.com'; // Reemplaza con tu dirección de correo electrónico de Gmail
    $mail->Password = 'Erivan926'; // Reemplaza con tu contraseña de Gmail
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configuración de los remitentes y destinatarios
    $mail->setFrom($correoRemitente, $nombreRemitente);
    $mail->addAddress($correoDestinatario, $nombreDestinatario);

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body = $mensaje;

    // Envío del correo
    $mail->send();
    echo 'El correo se envió correctamente.';
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
?>
