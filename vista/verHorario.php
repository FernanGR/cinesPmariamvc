<?php

  require_once '../dao/horarioDao.php';
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cines Empleados</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    </head>
    <body>
        <img src="imagenes/cines_pmaria.jpg"/>
        <?php

        session_start();

        ?>

        <br/>
        <table style="border: 1px solid black;" width="95%">
          <tr>
            <th style="border: 1px solid black;"><b>EMPLEADO</b></th>
            <th style="border: 1px solid black;"><b>LUNES</b></th>
            <th style="border: 1px solid black;"><b>MARTES</b></th>
            <th style="border: 1px solid black;"><b>MIÉRCOLES</b></th>
            <th style="border: 1px solid black;"><b>JUEVES</b></th>
            <th style="border: 1px solid black;"><b>VIERNES</b></th>
            <th style="border: 1px solid black;"><b>SÁBADO</b></th>
            <th style="border: 1px solid black;"><b>DOMINGO</b></th>
          </tr>

          <style>
          table, tr, th, td{
          border: 1px solid #000000;
          text-align: center;
              }
          </style>

          <?php
      //    $conexion = new mysqli('localhost','root','','cinespmaria');
    //   $resultados = $conexion->query("SELECT * FROM usuarios WHERE rol LIKE 'ROL_EMP'");
    //      $horarios = $conexion->query("SELECT * FROM horarios");
           $PUESTO = ['Libre', 'Puerta', 'Bar', 'Taquilla', 'Refuerzo'];

           foreach (Users::listaEmpleados() as $resultado) {

             if($resultado[4] == 1){
          //while($resultado = $resultados->fetch_assoc()){
           ?>
            <tr>

          <?php
          /*<input type="hidden" name="slunes" value="<?php  echo $slunes ?> " />*/
            echo  "<td><b>" . $resultado[0] . "</b> </td>";


          //  $horarioEmp = $conexion->query("SELECT * FROM horarios where horario = " . $resultado[5]);
          // while($horarioEmp = $horarioEmp->fetch_assoc()){
      //      $horarioEmp = $horarioEmp->fetch_assoc();
            $hor = $resultado[5];
          //  $horarioEmp2 = ;
            foreach (Horario::listaHorEmp($hor) as $horarioEmp){
            //lunes
            echo "<td>";
            if($horarioEmp[1] == 'Libre'){
              echo "<b>Libre</b>";
            }elseif($horarioEmp[1]=='Puerta' || $horarioEmp[1]=='Refuerzo'){
              echo "<b>Puesto: </b> " . $horarioEmp[1] . "<br/><b>Horario:</b> 17.00h - 1am";
            }elseif($horarioEmp[1]=='Bar'){
              echo "<b>Puesto: </b>Bar <br/> <b>Horario:</b> 17.00h - 00.00h";
            }else{
              echo "<b>Puesto: </b>Taquilla <br/> <b>Horario:</b> 16.30h - 23.30h";
            }
            echo "</td>";


            // Martes
            echo "<td>";
            if($horarioEmp[2] == 'Libre'){
              echo "<b>Libre</b>";
            }elseif($horarioEmp[2]=='Puerta' || $horarioEmp[2]=='Refuerzo'){
              echo "<b>Puesto: </b> " . $horarioEmp[2] . "<br/><b>Horario:</b> 17.00h - 1am";
            }elseif($horarioEmp[2]=='Bar'){
              echo "<b>Puesto: </b>". $horarioEmp[2] . " <br/> <b>Horario:</b> 17.00h - 00.00h";
            }else{
              echo "<b>Puesto: </b>Taquilla <br/> <b>Horario:</b> 16.30h - 23.30h";
            }
            echo "</td>";


          // miercoles

          echo "<td>";
          if($horarioEmp[3] == 'Libre'){
            echo "<b>Libre</b>";
          }elseif($horarioEmp[3]=='Puerta' || $horarioEmp[3]=='Refuerzo'){
            echo "<b>Puesto: </b> " . $horarioEmp[3] . "<br/><b>Horario:</b> 17.00h - 1am";
          }elseif($horarioEmp[3]=='Bar'){
            echo "<b>Puesto: </b>Bar <br/> <b>Horario:</b> 17.00h - 00.00h";
          }else{
            echo "<b>Puesto: </b>Taquilla <br/> <b>Horario:</b> 16.30h - 23.30h";
          }
          echo "</td>";

          // Jueves

          echo "<td>";
          if($horarioEmp[4] == 'Libre'){
            echo "<b>Libre</b>";
          }elseif($horarioEmp[4]=='Puerta' || $horarioEmp[4]=='Refuerzo'){
            echo "<b>Puesto: </b> " . $horarioEmp[4] . "<br/><b>Horario:</b> 17.00h - 1am";
          }elseif($horarioEmp['4']=='Bar'){
            echo "<b>Puesto: </b>Bar <br/> <b>Horario:</b> 17.00h - 00.00h";
          }else{
            echo "<b>Puesto: </b>Taquilla <br/> <b>Horario:</b> 16.30h - 23.30h";
          }
          echo "</td>";

          //viernes
          echo "<td>";
          if($horarioEmp[5] == 'Libre'){
            echo "<b>Libre</b>";
          }elseif($horarioEmp[5]=='Puerta' || $horarioEmp[5]=='Refuerzo'){
            echo "<b>Puesto: </b> " . $horarioEmp[5] . "<br/><b>Horario:</b> 17.00h - 1am";
          }elseif($horarioEmp[5]=='Bar'){
            echo "<b>Puesto: </b>Bar <br/> <b>Horario:</b> 17.00h - 00.00h";
          }else{
            echo "<b>Puesto: </b>Taquilla <br/> <b>Horario:</b> 16.30h - 23.30h";
          }
          echo "</td>";

          //sabado

          echo "<td>";
          if($horarioEmp[6] == 'Libre'){
            echo "<b>Libre</b>";
          }elseif($horarioEmp[6]=='Puerta' || $horarioEmp[6]=='Refuerzo'){
            echo "<b>Puesto: </b> " . $horarioEmp[6] . "<br/><b>Horario:</b> 17.00h - 1am";
          }elseif($horarioEmp[6]=='Bar'){
            echo "<b>Puesto: </b>Bar <br/> <b>Horario:</b> 17.00h - 00.00h";
          }else{
            echo "<b>Puesto: </b>Taquilla <br/> <b>Horario:</b> 16.30h - 23.30h";
          }
          echo "</td>";


        //domingo

        echo "<td>";
        if($horarioEmp[7] == 'Libre'){
          echo "<b>Libre</b>";
        }elseif($horarioEmp[7]=='Puerta' || $horarioEmp[7]=='Refuerzo'){
          echo "<b>Puesto: </b> " . $horarioEmp[7] . "<br/><b>Horario:</b> 17.00h - 1am";
        }elseif($horarioEmp[7]=='Bar'){
          echo "<b>Puesto: </b>Bar <br/> <b>Horario:</b> 17.00h - 00.00h";
        }else{
          echo "<b>Puesto: </b>Taquilla <br/> <b>Horario:</b> 16.30h - 23.30h";
        }
        echo "</td>";

         ?>

  <?php

  echo "</tr>";

} // fin foreach horario
} // if activo
        }
      ?>

      </table>

        <br/>


    </body>
</html>
