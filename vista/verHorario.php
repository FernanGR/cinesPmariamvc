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
    <!--    <table style="border: 1px solid black;" width="95%">    -->
          <table class="table table-bordered table-hover table-sm">
            <thead>
              <tr class='text-dark table-dark'>
                <th style="border: 1px solid black;" class="p-2"><b>EMPLEADO</b></th>
                <th style="border: 1px solid black;" class="p-2"><b>LUNES</b></th>
                <th style="border: 1px solid black;" class="p-2"><b>MARTES</b></th>
                <th style="border: 1px solid black;" class="p-2"><b>MIÉRCOLES</b></th>
                <th style="border: 1px solid black;" class="p-2"><b>JUEVES</b></th>
                <th style="border: 1px solid black;" class="p-2"><b>VIERNES</b></th>
                <th style="border: 1px solid black;" class="p-2"><b>SÁBADO</b></th>
                <th style="border: 1px solid black;" class="p-2"><b>DOMINGO</b></th>
              </tr>
            </thead>
            <tbody>
      <!--    <style>
          table, tr, th, td{
          border: 1px solid   #2b351f  ;
          text-align: center;
              }
          </style>    -->

          <?php

           $PUESTO = ['Libre', 'Puerta', 'Bar', 'Taquilla', 'Refuerzo'];

           foreach (Users::listaEmpleados() as $empleados) {

             if($empleados[4] == 1){ // para ver si esta activo
              if($empleados[0] == $empleadoActual){
               echo "<tr class='table-primary text-center'>";
             }else{
               echo "<tr class='text-muted table-muted text-center'>";
         }
             echo  "<td><b>" . $empleados[0] . "</b> </td>";


            $hor = $empleados[5];
             foreach (Horario::listaHorEmp($hor) as $horarioEmp){

            //lunes
            if($horarioEmp[1] == 'Libre'){
            echo "<td class='bg-roClaro'>";
          //  if($horarioEmp[1] == 'Libre'){
              echo "<b class='text-white'>Libre</b>";
            }elseif($horarioEmp[1]=='Puerta' || $horarioEmp[1]=='Refuerzo'){
                echo "<td>";
              echo "<b>" . $horarioEmp[1] . "</b><br/><b>17.00h - 1am</b>";
            }elseif($horarioEmp[1]=='Bar'){
              echo "<td>";
              echo "<b>Bar</b><br/> <b>17.00h - 00.00h</b>";
            }else{
              echo "<td>";
              echo "<b>Taquilla</b><br/> <b>16.30h - 23.30h</b>";
            }
            echo "</td>";


            // Martes
            if($horarioEmp[2] == 'Libre'){
            echo "<td class='bg-roClaro'>";
          //  if($horarioEmp[1] == 'Libre'){
              echo "<b class='text-white'>Libre</b>";
            }elseif($horarioEmp[2]=='Puerta' || $horarioEmp[2]=='Refuerzo'){
                echo "<td>";
              echo "<b>" . $horarioEmp[2] . "</b><br/><b>17.00h - 1am</b>";
            }elseif($horarioEmp[2]=='Bar'){
              echo "<td>";
              echo "<b>Bar</b><br/> <b>17.00h - 00.00h</b>";
            }else{
              echo "<td>";
              echo "<b>Taquilla</b><br/> <b>16.30h - 23.30h</b>";
            }
            echo "</td>";


          // miercoles
          if($horarioEmp[3] == 'Libre'){
          echo "<td class='bg-roClaro'>";
        //  if($horarioEmp[1] == 'Libre'){
            echo "<b class='text-white'>Libre</b>";
          }elseif($horarioEmp[3]=='Puerta' || $horarioEmp[3]=='Refuerzo'){
              echo "<td>";
            echo "<b>" . $horarioEmp[3] . "</b><br/><b>17.00h - 1am</b>";
          }elseif($horarioEmp[3]=='Bar'){
            echo "<td>";
            echo "<b>Bar</b><br/> <b>17.00h - 00.00h</b>";
          }else{
            echo "<td>";
            echo "<b>Taquilla</b><br/> <b>16.30h - 23.30h</b>";
          }
          echo "</td>";


          // Jueves
          if($horarioEmp[4] == 'Libre'){
          echo "<td class='bg-roClaro'>";
        //  if($horarioEmp[1] == 'Libre'){
            echo "<b class='text-white'>Libre</b>";
          }elseif($horarioEmp[4]=='Puerta' || $horarioEmp[4]=='Refuerzo'){
              echo "<td>";
            echo "<b>" . $horarioEmp[4] . "</b><br/><b>17.00h - 1am</b>";
          }elseif($horarioEmp[4]=='Bar'){
            echo "<td>";
            echo "<b>Bar</b><br/> <b>17.00h - 00.00h</b>";
          }else{
            echo "<td>";
            echo "<b>Taquilla</b><br/> <b>16.30h - 23.30h</b>";
          }
          echo "</td>";


          //viernes
          if($horarioEmp[5] == 'Libre'){
          echo "<td class='bg-roClaro'>";
        //  if($horarioEmp[1] == 'Libre'){
            echo "<b class='text-white'>Libre</b>";
          }elseif($horarioEmp[5]=='Puerta' || $horarioEmp[5]=='Refuerzo'){
              echo "<td>";
            echo "<b>" . $horarioEmp[5] . "</b><br/><b>17.00h - 1am</b>";
          }elseif($horarioEmp[5]=='Bar'){
            echo "<td>";
            echo "<b>Bar</b><br/> <b>17.00h - 00.00h</b>";
          }else{
            echo "<td>";
            echo "<b>Taquilla</b><br/> <b>16.30h - 23.30h</b>";
          }
          echo "</td>";


          //sabado
          if($horarioEmp[6] == 'Libre'){
          echo "<td class='bg-roClaro'>";
        //  if($horarioEmp[1] == 'Libre'){
            echo "<b class='text-white'>Libre</b>";
          }elseif($horarioEmp[6]=='Puerta' || $horarioEmp[6]=='Refuerzo'){
              echo "<td>";
            echo "<b>" . $horarioEmp[6] . "</b><br/><b>17.00h - 1am</b>";
          }elseif($horarioEmp[6]=='Bar'){
            echo "<td>";
            echo "<b>Bar</b><br/> <b>17.00h - 00.00h</b>";
          }else{
            echo "<td>";
            echo "<b>Taquilla</b><br/> <b>16.30h - 23.30h</b>";
          }
          echo "</td>";



        //domingo
        if($horarioEmp[7] == 'Libre'){
        echo "<td class='bg-roClaro'>";
      //  if($horarioEmp[1] == 'Libre'){
          echo "<b class='text-white'>Libre</b>";
        }elseif($horarioEmp[7]=='Puerta' || $horarioEmp[7]=='Refuerzo'){
            echo "<td>";
          echo "<b>" . $horarioEmp[7] . "</b><br/><b>17.00h - 1am</b>";
        }elseif($horarioEmp[7]=='Bar'){
          echo "<td>";
          echo "<b>Bar</b><br/> <b>17.00h - 00.00h</b>";
        }else{
          echo "<td>";
          echo "<b>Taquilla</b><br/> <b>16.30h - 23.30h</b>";
        }
        echo "</td>";

         ?>

  <?php

  echo "</tr>";
} // fin foreach horario
} // if activo
        }
      ?>
    </tbody>
      </table>

        <br/>



    </body>
