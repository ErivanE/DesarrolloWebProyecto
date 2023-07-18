<?php
$user = $_GET["user"];
use PHPMailer\PHPMailer\PHPMailer;

include "conexion.php";
include "../fpdf185/fpdf.php";
require "../vendor/autoload.php";

//USUARIO
$idUsuario;
$nombre;
$direccion;
$correo;
$cp;
$contrasena;

$total = 0;

$usuario = $con->query("SELECT * FROM usuarios WHERE correo = '$user'");
if ($usuario && $usuario->num_rows > 0) {
    $fila = $usuario->fetch_assoc();
    $idUsuario = $fila['id'];
    $nombre = $fila['nombre'];
    $direccion = $fila['direccion'];
    $cp = $fila['cp'];
    $correo = $fila['correo'];
    $contrasena = $fila['contrasena'];
}
//CARRITO
// Crear un nuevo objeto FPDF
$pdf = new FPDF();
// Agregar una nueva página al PDF
$pdf->AddPage();

// Generar el contenido del PDF
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 10, 'Este mensaje ha sido enviado por KSP Games', 0, 1);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Para: ' . $nombre, 0, 1);
$pdf->Cell(0, 10, 'Productos:', 0, 1);

$resultado_carrito = $con->query("SELECT * FROM carrito WHERE nombre_usuario = '$user'");
if ($resultado_carrito && $resultado_carrito->num_rows > 0) {
    while ($fila_carrito = mysqli_fetch_assoc($resultado_carrito)) {
        // Obtener los datos específicos del carrito
        $nombre_producto = $fila_carrito['nombre_producto'];
        // Otros campos del carrito
        $precio = $fila_carrito['precio'];
        $total += $precio;

        // Agregar los datos del carrito al PDF
        $pdf->Cell(0, 10, "\t\t " . $nombre_producto . "$" . $precio, 0, 1);
        // Agregar otros campos del carrito al PDF
    }
    $pdf->Cell(0, 10, "\t\tTotal: $total", 0, 1);
}
$fecha = date('l jS \of F Y h:i:s A');
$pdf->Cell(0, 10, 'Fecha: ' . $fecha, 0, 1); // Cambio de $datos_historial['fecha'] a $fecha

// Guardar el PDF en el servidor
$pdfPath = '../pdf/orden' . $idUsuario . '.pdf'; //ruta

if (is_writable('../pdf/')) {
    // La carpeta es escribible, continuar con la generación del PDF
    $pdf->Output($pdfPath, 'F');
} else {
    echo "Error: La carpeta de destino no tiene permisos de escritura.";
}

// Definir los encabezados del correo electrónico
$mail = new PHPMailer();
$mail->CharSet = 'utf-8';
$mail->Host = "smtp.googlemail.com";
$mail->From = "ielizalde185@gmail.com";
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Username = "ielizalde185@gmail.com";
$mail->Password = "csdoseadxkfcbzqf";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->AddAddress($correo);
$mail->SMTPDebug = 0; //Muestra las trazas del mail, 0 para ocultarla
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = 'GRACIAS POR TU PREFERENCIA!';
$mail->Body = '<b>Adjuntamos un resumen de tu compra</b>';
$mail->AltBody = 'Te mandamos el resumen de tu compra';


//Adjuntar pdf a $mail
$inMailFileName = "recibo.pdf";
$filePath = '../pdf/orden' . $idUsuario . '.pdf';
if(file_exists($filePath)){
    $mail->AddAttachment($filePath, $inMailFileName);
}else{
    echo 'La ruta del pdf no existe';
}

$envio = $mail->send();
if ($envio) {
    echo '\nEnvio exitoso';
    header('location: EliminarCarrito.php?user='.$user);
} else {
    echo '\nNo se enviaaaaaaaaaa ' . $mail->ErrorInfo;
    header('location: ../pruebas.html');
}
//header('location: EliminarCarrito.php?user='.$user);
?>