<?php
require_once '../Modelo/horarioModelo.php';
require_once '../Modelo/userModelo.php';
require_once '../modelo/conexion.php';
require_once '../Modelo/imagenesModelo.php';

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

  $fila = $_POST['fila'];
  $silla = $_POST['silla'];
  $sesion = $_POST['sesion'];
  $usuario = $_POST['usuario'];
  $pelicula = $_POST['pelicula'];
  $dia = $_POST['dia'];
  $sala = $_POST['sala'];
/*
if (empty($_POST['email'])){
     echo "Rellena el campo del email para poder enviarte la entrada. <br/>";
     echo "<a href='../vista/indexComprada.php?fila=" . ((int)$fila-1) . "&silla=" . ((int)$silla-1) . "&sesion=" . $sesion . "&sala=". $sala . "&pelicula=" . $pelicula ."&dia=" . $dia. "&usuario=" . $usuario . "'><h2>Volver atras</h2></a>";
   }
   else{
*/
   $imgPeli = Img::listaImg();

   $html = '
   <table width="100%" border="0" cellpadding="2">
       <tr>
           <td align="center">
             <img  src="../imagenes/ticket3.jpg" width="180" height="100" />
           </td>
           <td align="center">
             <img  src="../imagenes/codigoQR.jpg" width="180" height="100" />
           </td>
       </tr>
   <table>

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
  <td style="border: 1px solid black;">Día: ' .$dia. '<br/>
  Hora: '. $sesion  . '</td>
  </tr>
  <tr>
  <td colspan="2" style="border: 1px solid black;" align="center"> <span>Presente esta entrada en la puerta</span></td>
  </tr>

  </table>
  <br/>
    <div align="center">
    <img  src="'. $imgPeli[(int)$sala-1][1]. '" width="320" height="130" />
    </div>
    <br/> ';

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
    $mail->setFrom('CinesPmaria@gmail.com', 'Cines Pmaria');
  //  $mail->addAddress('tibofgr@gmail.com', 'Nombre');     // Add a recipient

  $mail->addAddress($_POST["email"], $usuario);     //para que capture del formulario el email al que enviarlo
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
    echo '<h2 class="text-primary"><b>Entrada enviada!!</b></h2>';
    //$cadena = "?diaActual=". $dia."&sesionActual=" . $sesion . "&peliculaActual=" . $pelicula ;
    //   echo "<a href='../vista/indexComEntrada.php'><button class='btn-rClaro my-3'>COMPRAR MÁS ENTRADAS</button></a>";

    ?>
      <form name = "formVuelta" method="POST" action='../vista/indexComEntrada.php'>

      <!-- para pasar las variables con el formulario -->
        <input type="hidden" name="sesionActual" value="<?php echo $sesion ?>" />
        <input type="hidden" name="peliculaActual" value="<?php echo $pelicula ?>" />
        <input type="hidden" name="emailuser" value="<?php echo $emailuser ?>" />
        <input type="hidden" name="diaActual" value="<?php echo $dia ?>" />
        <input type="hidden" name="usuario" value="<?php echo $usuario ?>" />
        <br/>
        <input type="submit" value="COMPRAR MÁS ENTRADAS!" name="enviar" class="btn-success p-1"/>
      </form>
      <?php

//    echo "<a href='../vista/indexComEntrada.php?sesionActual=" . $sesion . "&peliculaActual=" . $pelicula . "&diaActual=" . $dia . "'><button class='btn-rClaro my-3'>COMPRAR MÁS ENTRADAS</button></a>";

    //  echo "<a href='../vista/indexComEntrada.php'><button class='btn-rClaro p-2 m-1'><b>COMPRAR MÁS ENTRADAS</b></button></a>";



 } catch (Exception $e) {
    echo "Mensaje NO enviado. Mailer Error: {$mail->ErrorInfo}";
    echo "<a href='../vista/indexComEntrada.php'><button class='btn-rClaro p-2 m-2'>Volver</button></a>";

}



?>
