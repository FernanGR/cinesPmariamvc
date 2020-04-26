<?php
  require_once '../Modelo/horarioModelo.php';
  require_once '../Modelo/userModelo.php';
  require_once '../modelo/conexion.php';
  require_once '../Modelo/imagenesModelo.php';


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


<br/><br/>
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
<td colspan="2" style="border: 1px solid black;" align="center"> <span>Presente esta entrada en la puerta</span></td>
</tr>

</table>
<br/>

<div align="center">
<img  src="'. $imgPeli[$sala-1][1]. '" width="320" height="130" />
</div>
<br/> ';

$nombreEntrada = "Entrada-" . $usuario . ".pdf";
$documento->WriteHTML($html, true, false, true, false, '');

$documento->Output($nombreEntrada,"D");


?>
