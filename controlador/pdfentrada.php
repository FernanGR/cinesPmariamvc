<?php
  require_once '../dao/horarioDao.php';
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/imagenesDao.php';


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
  $sala = $_GET['sala'];
  $peliculas = $_GET['pelicula'];
  $usuario = $_GET['usuario'];
  $dia1 = $_GET['dia'];
  $imgPeli = Img::listaImg();
$html = '
  <img  src="'. $imgPeli[$sala-1][1]. '" width="400" height="200" />

<br/>
<table style="border: 1px solid black;" width="95%">
<tr>
<td style="border: 1px solid black;"><b>PELÍCULA</b></td>
<td style="border: 1px solid black;">' . $peliculas  . '</td>
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
<td style="border: 1px solid black;">Día: ' .$dia1. '<br>
Hora: '. $sesion  . '</td>
</tr>
<tr>
<td colspan="2" style="border: 1px solid black;">Presente esta entrada en la sala</td>
</tr>

</table>
<img  src="../imagenes/ticket3.jpg" width="400" height="200" />

<br> ';

$nombreEntrada = "Entrada-" . $usuario . ".pdf";
$documento->WriteHTML($html, true, false, true, false, '');

$documento->Output($nombreEntrada,"D");


?>
