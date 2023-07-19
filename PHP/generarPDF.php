<?php
#Conexion a la BD
include 'conexion.php';

#PHPMailer, fpdf y vendor
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//use FPDF\FPDF;

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
    $fila       = $usuario->fetch_assoc();
    $idUsuario  = $fila['id'];
    $nombre     = $fila['nombre'];
}
//Datos Carrito

//Configuracion PDF
try {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, 'Este mensaje ha sido enviado por KSP Games', 0, 1);
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Para: ' . $nombre, 0, 1);
    $pdf->Cell(0, 10, 'Productos:', 0, 1);

    try { //try tabla de productos
        //code...
        $resultado_carrito = $con->query("SELECT * FROM carrito WHERE nombre_usuario = '$user'");
        if ($resultado_carrito && $resultado_carrito->num_rows > 0) {
            while ($fila_carrito = mysqli_fetch_assoc($resultado_carrito)) {
                
                $total += $fila_carrito['precio'];
                $pdf->Cell(0, 10, "\t\t " . $fila_carrito['nombre_producto']. " $" . $fila_carrito['precio'], 0, 1);
            }
            $pdf->Cell(0, 10, "\t\tTotal: $total", 0, 1);
        }
        $fecha = date('l jS \of F Y h:i:s A');
    } catch (Exception $e) {
        //throw $th;
        echo 'Error en tablas de productos: '.$e;
    }
    $pdf->Cell(0, 10, 'Fecha: ' . $fecha, 0, 1); // Cambio de $datos_historial['fecha'] a $fecha
    

    try { //try guardar pdf
        //code...
        //Guardar PDF
        //$numero = rand(1,50);
        $nombreArchivo = 'recibo.pdf';
        $rutaArchivo = '../pdf/recibo.pdf';
        $pdf->Output($rutaArchivo, 'F');
    } catch (Exception $e) {
        //throw $th;
        echo 'Error en guardar pdf'.$e;
    }
} catch (Exception $e) {
    //throw $th;
    echo 'Error al generar pdf: '.$e->getMessage();
}

if(file_exists($rutaArchivo)){
    echo 'si se genero el pdf';
}else{
    echo 'nosegeneroelpdf;LAKSJDFNCXZV';
}

// Configuración del correo electrónico
$nombreRemitente = 'KSPGames';
$correoRemitente = 'a21110138@ceti.mx';
$nombreDestinatario = $nombre;
$correoDestinatario = $user;
$asunto = 'Resumen de Compra';
$mensaje = 'Gracias por su compra :D';

// Configuración de PHPMailer
echo 'Antes de phpmailer true';
$mail = new PHPMailer(true); // Habilita las excepciones de PHPMailer
echo '/ndespues??';
try {
    echo 'entrando al try';
    // Configuración del servidor SMTP de Google
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'a21110138@ceti.mx'; // Reemplaza con tu dirección de correo electrónico de Gmail
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
    try {
        //code...
        $mail->AddAttachment($rutaArchivo, $nombreArchivo);
    } catch (Exception $e) {
        //throw $th;
        echo 'error al adjuntar el pdf '.$e;
    }

    // Envío del correo
    $nCompraAnterior = mysqli_query($con, "SELECT numeroCompra from usuarios where id = '$user'");
    $nCompraNuevo = $nCompraAnterior + 1;
    $mail->send();
    echo 'El correo se envió correctamente. '.$nCompraAnterior.' nv:  '.$nCompraNuevo.'ggg';
    $query = mysqli_query($con, "UPDATE usuarios SET numeroCompra =$nCompraNuevo WHERE id = '$user' ");
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
?>