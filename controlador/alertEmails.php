<?php
  require_once '../modelo/horarioModelo.php';
  require_once '../modelo/userModelo.php';
  require_once '../modelo/conexion.php';

?>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';


include('../tcpdf/config/tcpdf_config.php');
include('../tcpdf/tcpdf.php');

$documento = new TCPDF();

$documento->setPrintHeader(false);
$documento->setPrintFooter(false);
$documento->SetTitle("Entrada Cine");
$documento->AddPage('p','A5');

session_start();
$comentario = $_POST['comentario'];
$emails = Users::emailsUsers();
/*$listaEmails ="";
 foreach ($emails as $users) {
   $listaEmails .= $users[0];
    if (next($emails)==true) $listaEmails .= ",";
 }*/

//$nombreEntrada = "/../entradas/entrada-" . $usuario . ".pdf";

//$documento->WriteHTML($html, true, false, true, false, '');

//$documento->Output(__DIR__ . $nombreEntrada,"F");

//ENVIO DE ENTRADA ADJUNTADA AL EMAIL.
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cinespmaria@gmail.com';      //escribir email a enviar               // SMTP username
    $mail->Password   = 'msi12345';           //escribir contraseña                    // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('CinesPmaria@gmail.com', 'Cines Pmaria');

    $mail->addAddress("cinespmaria@gmail.com");     // copia para ver que se envia
    //$mail->addAddress('mfornes@iesperemaria.com');               // Name is optional
    //$mail->addReplyTo('bb@', 'Correo de respuesta');
    //$mail->addCC($listaEmails);
    foreach ($emails as $users) { // TODOS LOS EMAILS DE USUARIOS
      $mail->addBCC($users[0]);

          }

    // Attachments
    //$mail->addAttachment(__DIR__ .$nombreEntrada);         // Add attachments
    //$mail->addAttachment('fiestas.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Novedades sobre Cines Pmaria!!';
    $mail->Body    = 'Hola cine adictos, somos Cines Pmaria!. <br/> Gracías por estar siempre con nosotros. Aqui les cuento nuestras novedades: <br/>' . $comentario;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
  //  echo 'Mensaje enviado OK!<br/>';
  //  echo "<button><a href='../index.php>Volver al menu</a></button>";
//  echo "<a href='../vista/indexComEmp.php'><input type='button' value='Volver al menu'></a>";
echo'<script type="text/javascript">
      alert("Mensaje enviado. Muchas gracias.");
      window.location.href="../vista/indexEditUsers.php";
      </script>';
    //  echo "<a href='cinepagina.php?sesionActual=" . $sesion ."&peliculaActual=" . $pelicula ."&diaActual=" . $dia . "'><img src='imagenes/comprar-mas.png'></a>";

      //echo "<a href='cinecomprada.php?sesionActual=" . $GET_['sesion'] . "'><img src='imagenes/comprar-mas.png'></a>";
} catch (Exception $e) {
    echo "Mensaje NO enviado. Mailer Error: {$mail->ErrorInfo}";
}



?>
