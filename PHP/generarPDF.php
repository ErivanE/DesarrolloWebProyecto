<?php
session_start();
include "../php/Conexion.php";
require "../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
include "../fpdf185/fpdf.php";

$id_usuario = $_SESSION['id_usuario']; 
$nombre = $_SESSION['nombre'];
$telefono = $_SESSION['telefono'];
$correo = $_SESSION['correo'];
$total = $_SESSION['total'];

$productos = json_decode($_SESSION["productos"]);
$producto = $productos[0]->nombre_producto;

$sql_historial = "SELECT * FROM historial WHERE id_usuario = $id_usuario";
$resultado_historial = $con->query($sql_historial);
$datos_historial = mysqli_fetch_assoc($resultado_historial);

$sql_carrito = "SELECT * FROM carrito WHERE id_usuario = $id_usuario";
$resultado_carrito = $con->query($sql_carrito);

$sql_usuario = "SELECT * FROM usuario WHERE nombre = '$nombre' and correo = '$correo'
 and telefono = '$telefono'";
$resultado_usuario = $con->query($sql_usuario);
$datos_usuario = mysqli_fetch_assoc($resultado_usuario);


 $sql_busqueda = "SELECT * FROM usuario WHERE  nombre = '$nombre' and correo = '$correo'
 and telefono = '$telefono' ";



    include "../php/Conexion.php";

    // Crear un nuevo objeto FPDF
    $pdf = new FPDF();

    // Agregar una nueva página al PDF
    $pdf->AddPage();

    // Generar el contenido del PDF
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, 'Este mensaje ha sido enviado por SpeedWheels', 0, 1);
    $pdf->Ln(10); // Cambio de ln a Ln
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Para: ' . $nombre, 0, 1); // Cambio de $datos_usuario['nombre'] a $nombre
    $pdf->Cell(0, 10, 'Teléfono: ' . $telefono, 0, 1); // Cambio de $datos_usuario['telefono'] a $telefono
    $pdf->Cell(0, 10, 'Automóvil:', 0, 1);

    if ($resultado_carrito && $resultado_carrito->num_rows > 0) {
        while ($fila_carrito = mysqli_fetch_assoc($resultado_carrito)) {
            // Obtener los datos específicos del carrito
            $nombre_producto = $fila_carrito['nombre_producto'];
            // Otros campos del carrito
            
            // Agregar los datos del carrito al PDF
            $pdf->Cell(0, 10, "\t\t$nombre_producto", 0, 1);
            // Agregar otros campos del carrito al PDF
            
        }
    }
    $fecha = date('l jS \of F Y h:i:s A');
    $pdf->Cell(0, 10, 'Fecha: ' . $fecha, 0, 1); // Cambio de $datos_historial['fecha'] a $fecha
    $pdf->Cell(0, 10, 'Total: $' . $total, 0, 1); // Cambio de $datos_historial['total'] a $total

      // Guardar el PDF en el servidor
    $pdfPath = '../pdf/orden'.$id_usuario.'.pdf';
    $pdf->Output($pdfPath, 'F');

    // Definir los encabezados del correo electrónico
    $mail = new PHPMailer();
	$mail->CharSet = 'utf-8';
	$mail->Host = "smtp.googlemail.com";
	$mail->From = "rodriguez.salazar.hector1@gmail.com";
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Username = "rodriguez.salazar.hector1@gmail.com";
	$mail->Password = "qvolbvlxthjyiodr";
	$mail->SMTPSecure = "ssl";
	$mail->Port = 465;
	$mail->AddAddress($correo);
	$mail->SMTPDebug = 0;   //Muestra las trazas del mail, 0 para ocultarla
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'GRACIAS POR PREFERIRNOS!';
	$mail->Body = '<b>Adjuntamos un resumen de tu compra nwn</b>';
	$mail->AltBody = 'Te mandamos el resumen de tu compra';

	$inMailFileName = "recibo.pdf";
	$filePath = "../pdf/orden$id_usuario.pdf";
	$mail->AddAttachment($filePath, $inMailFileName);

	$mail->send(); ?>