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
$numeroCompra;
$usuario = $con->query("SELECT * FROM usuarios WHERE correo = '$user'");
if ($usuario && $usuario->num_rows > 0) {
    $fila = $usuario->fetch_assoc();
    $idUsuario = $fila['id'];
    $nombre = $fila['nombre'];
    $numeroCompra = $fila['numeroCompra'];
}
//Datos Carrito

//Configuracion PDF
try {
    $rutaLogo = '../img/icons/KSPGames.png';

    $pdf = new FPDF();
    $pdf->AddPage();
    $anchoPagina = $pdf->GetPageWidth();
    $anchoImagen = 75;
    $posicionX = $anchoPagina - $anchoImagen;
    $pdf->Image($rutaLogo, $posicionX, 0, $anchoImagen, 15);

    //$pdf->Image($rutaLogo, 0, 0, 100, 25);
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 20, 'Este mensaje ha sido enviado por KSP Games', 0, 1);
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
                $pdf->Cell(0, 10, "\t\t " . $fila_carrito['nombre_producto'] . " $" . $fila_carrito['precio'], 0, 1);
            }
            $pdf->Cell(0, 10, "\t\tTotal: $total", 0, 1);
        }
        $fecha = date('l jS \of F Y h:i:s A');
    } catch (Exception $e) {
        //throw $th;
        echo 'Error en tablas de productos: ' . $e;
    }
    $pdf->Cell(0, 10, 'Fecha: ' . $fecha, 0, 1); // Cambio de $datos_historial['fecha'] a $fecha


    try { //try guardar pdf
        //code...
        //Guardar PDF
        //$numero = rand(1,50);
        $archivo = "recibo$idUsuario$numeroCompra.pdf";
        $rutaArchivo = "../pdf/$archivo";
        //$rutaArchivo = '../pdf/recibo.pdf';
        $pdf->Output($rutaArchivo, 'F');

        $webdavUrl = "http://10.0.0.3/VirtualizacionWebDav/pdf/$archivo";
        // Inicializar cURL y configurar la solicitud WebDAV
        $ch = curl_init($webdavUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_PUT, true);
        curl_setopt($ch, CURLOPT_INFILE, fopen($rutaArchivo, 'r'));
        curl_setopt($ch, CURLOPT_INFILESIZE, filesize($rutaArchivo));

        // Ejecutar la solicitud WebDAV
        $response = curl_exec($ch);

        // Verificar si la solicitud se realizó con éxito
        if ($response === false) {
            echo 'Error al subir el archivo a WebDAV: ' . curl_error($ch);
        } else {
            echo 'El archivo se subió correctamente a WebDAV.';
        }

        // Cerrar la conexión cURL
        curl_close($ch);
    } catch (Exception $e) {
        //throw $th;
        echo 'Error en guardar pdf' . $e;
    }
} catch (Exception $e) {
    //throw $th;
    echo 'Error al generar pdf: ' . $e->getMessage();
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
        $mail->AddAttachment($rutaArchivo, $archivo);
    } catch (Exception $e) {
        //throw $th;
        echo 'error al adjuntar el pdf ' . $e;
    }

    // Envío del correo
    $numeroCompra += 1;
    $mail->send();
    $query = mysqli_query($con, "UPDATE usuarios SET numeroCompra =$numeroCompra WHERE correo = '$user' ");
    if ($query) {
        echo 'Numero de compra actualizado';
        header('location: EliminarCarrito.php?user=' . $user);
    }
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
?>