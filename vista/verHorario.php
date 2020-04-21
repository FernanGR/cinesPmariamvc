<?php

  require_once '../Modelo/horarioModelo.php';
  //require_once '../Modelo/userModelo.php';
  require_once '../modelo/conexion.php';

?>

    <body>
      <?php
        $empleadoActual = $_SESSION['usuario'];
      ?>
        <br/>

        <br/>
        <table style="border: 1px solid black;" width="95%">
          <tr class='text-dark'>
            <th style="border: 1px solid black;" class="p-2"><b>EMPLEADO</b></th>
            <th style="border: 1px solid black;" class="p-2"><b>LUNES</b></th>
            <th style="border: 1px solid black;" class="p-2"><b>MARTES</b></th>
            <th style="border: 1px solid black;" class="p-2"><b>MIÉRCOLES</b></th>
            <th style="border: 1px solid black;" class="p-2"><b>JUEVES</b></th>
            <th style="border: 1px solid black;" class="p-2"><b>VIERNES</b></th>
            <th style="border: 1px solid black;" class="p-2"><b>SÁBADO</b></th>
            <th style="border: 1px solid black;" class="p-2"><b>DOMINGO</b></th>
          </tr>

          <style>
          table, tr, th, td{
          border: 1px solid   #2b351f  ;
          text-align: center;
              }
          </style>

          <?php

           $PUESTO = ['Libre', 'Puerta', 'Bar', 'Taquilla', 'Refuerzo'];

           foreach (Users::listaEmpleados() as $empleados) {

             if($empleados[4] == 1){ // para ver si esta activo
              if($empleados[0] == $empleadoActual){
               echo "<tr class='text-danger'>";
             }else{
               echo "<tr class='text-muted'>";
         }
             echo  "<td><b>" . $empleados[0] . "</b> </td>";


            $hor = $empleados[5];
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
