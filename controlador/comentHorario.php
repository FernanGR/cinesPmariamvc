<?php

  require_once '../dao/horarioDao.php';
  require_once '../dao/userDao.php';
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


$usuario = $_GET['user'];
$comentario = $_GET['comentario'];

$html = '
    Hola, soy ' . $usuario . '.
    Le envio este email para comentarle esto sobre los horarios de esta semana:'
    . $comentario ;


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
    $mail->setFrom('fernandodawsp@gmail.com', 'Fernando GR');
  //  $mail->addAddress('tibofgr@gmail.com', 'Nombre');     // Add a recipient

  $mail->addAddress($_GET["email"], $usuario);     //para que capture del formulario el email al que enviarlo
    //$mail->addAddress('mfornes@iesperemaria.com');               // Name is optional
    //$mail->addReplyTo('bb@', 'Correo de respuesta');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment(__DIR__ .$nombreEntrada);         // Add attachments
    //$mail->addAttachment('fiestas.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Comentario sobre horarios.';
    $mail->Body    = 'Hola, soy  ' . $usuario . '. <br/>Aqui esta mi sugerencia sobre los horarios para la semana que viene: <br/>' . $comentario;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensaje enviado OK!<br/>';
  //  echo "<button><a href='../index.php>Volver al menu</a></button>";
    echo "<a href='../index.php?user=$usuario&rol=ROL_EMP'><input type='button' value='Volver al menu'></a>";

    //  echo "<a href='cinepagina.php?sesionActual=" . $sesion ."&peliculaActual=" . $pelicula ."&diaActual=" . $dia . "'><img src='imagenes/comprar-mas.png'></a>";

      //echo "<a href='cinecomprada.php?sesionActual=" . $GET_['sesion'] . "'><img src='imagenes/comprar-mas.png'></a>";
} catch (Exception $e) {
    echo "Mensaje NO enviado. Mailer Error: {$mail->ErrorInfo}";
}



?>
