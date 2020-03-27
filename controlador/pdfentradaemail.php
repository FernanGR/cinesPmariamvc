<?php
require_once '../dao/horarioDao.php';
require_once '../dao/userDao.php';
require_once '../modelo/conexion.php';
require_once '../dao/imagenesDao.php';

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

  $fila = $_GET['fila'];
  $silla = $_GET['silla'];
  $sesion = $_GET['sesion'];
  $usuario = $_GET['usuario'];
  $pelicula = $_GET['pelicula'];
  $dia = $_GET['dia'];
  $sala = $_GET['sala'];

if (empty($_GET['email'])){
     echo "Rellena el campo del email para poder enviarte la entrada. <br/>";
     echo "<a href='../vista/comprada.php?fila=" . ((int)$fila-1) . "&silla=" . ((int)$silla-1) . "&sesion=" . $sesion . "&sala=". $sala . "&pelicula=" . $pelicula ."&dia=" . $dia. "&usuario=" . $usuario . "'><h2>Volver atras</h2></a>";
   }
   else{

   $imgPeli = Img::listaImg();
   $html = '
     <img  src="'. $imgPeli[(int)$sala-1][1]. '" width="400" height="200" />

  <br/>
  <table style="border: 1px solid black;" width="95%">
  <tr>
  <td style="border: 1px solid black;"><b>PELÍCULA</b></td>
  <td style="border: 1px solid black;">' . $pelicula  . '</td>
  </tr>
  <tr>
  <td style="border: 1px solid black;"><b>SALA</b></td>
  <td style="border: 1px solid black;">' . $sala  . '</td>
  </tr>

  <tr>
  <td style="border: 1px solid black;"><b>FILA</b></td>
  <td style="border: 1px solid black;">' . $fila  . '</td>
  </tr>
  <tr>
  <td style="border: 1px solid black;"><b>BUTACA</b></td>
  <td style="border: 1px solid black; ">' . $silla . '</td>
  </tr>
  <tr>
  <td style="border: 1px solid black;"><b>FECHA</b></td>
  <td style="border: 1px solid black;">Día: ' .$dia. '<br>
  Hora: '. $sesion  . '</td>
  </tr>
  <tr>
  <td colspan="2" style="border: 1px solid black;">Presente esta entrada en la sala</td>
  </tr>

  </table>
  <img  src="../imagenes/ticket3.jpg" width="400" height="200" />

  <br> ';


  $nombreEntrada = "/../entradas/entrada-" . $usuario . ".pdf";

  $documento->WriteHTML($html, true, false, true, false, '');

  $documento->Output(__DIR__ . $nombreEntrada,"F");

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
    $mail->addAttachment(__DIR__ .$nombreEntrada);         // Add attachments
    //$mail->addAttachment('fiestas.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Entrada de Cine ';
    $mail->Body    = 'Hola ' . $usuario . '. <br/>Aqui esta su entrada de Cine :P';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensaje enviado OK!<br/>';
      echo "<a href='../vista/comprarEntrada.php?usuario=" . $usuario . "&sesionActual=" .  $sesion ."&peliculaActual=" . $pelicula ."&diaActual=" . $dia . "'><img src='../imagenes/comprar-mas.png'></a>";
    //  echo "<a href='cinepagina.php?sesionActual=" . $sesion ."&peliculaActual=" . $pelicula ."&diaActual=" . $dia . "'><img src='imagenes/comprar-mas.png'></a>";

      //echo "<a href='cinecomprada.php?sesionActual=" . $GET_['sesion'] . "'><img src='imagenes/comprar-mas.png'></a>";
} catch (Exception $e) {
    echo "Mensaje NO enviado. Mailer Error: {$mail->ErrorInfo}";
}

}

?>
