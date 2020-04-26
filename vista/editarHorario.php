<?php


?>

    <body>

        <br/>
        <h2 class="text-success text-center"><b> Modificar Horarios de Empleados </b></h2>


        <br/>


            <!--    <table style="border: 1px solid black;" width="95%">    -->
              <table class="table table-bordered table-hover table-sm text-center">
              <thead>
                <tr class='text-dark table-dark'>

                  <th style="border: 1px solid black;" class="text-blue p-1"><b>NOMBRE</b></th>
                  <th style="border: 1px solid black;" class="text-blue p-1"><b>LUNES</b></th>
                  <th style="border: 1px solid black;" class="text-blue p-1"><b>MARTES</b></th>
                  <th style="border: 1px solid black;" class="text-blue p-1"><b>MIÉRCOLES</b></th>
                  <th style="border: 1px solid black;" class="text-blue p-1"><b>JUEVES</b></th>
                  <th style="border: 1px solid black;" class="text-blue p-1"><b>VIERNES</b></th>
                  <th style="border: 1px solid black;" class="text-blue p-1"><b>SÁBADO</b></th>
                  <th style="border: 1px solid black;" class="text-blue p-1"><b>DOMINGO</b></th>
                  <th style="border: 1px solid black;" class="text-blue p-1"><b>ACCIÓN</b></th>

              </tr>
            </thread>

          <style>
              table, tr, th, td{
              border: 1px solid #2b351f;
              text-align: center;
              }
          </style>

          <?php

           $PUESTO = ['Libre', 'Puerta', 'Bar', 'Taquilla', 'Refuerzo'];


          //while($resultado = $resultados->fetch_assoc()){
          foreach (Users::listaEmpleados() as $empleado) {
           ?>
           <tbody>
            <tr>
              <form name = "formulario" method="POST" action= '../controlador/actualizarHorario.php'>
              <input type="hidden" name="emp" value="<?php  echo $empleado[5] ?> " />

          <?php
             echo  "<td class='text-dark'><b>" . $empleado[0] . "</b> </td>";

      $hor = $empleado[5];
       foreach (Horario::listaHorEmp($hor) as $horarioEmp){

        echo  "<td > <select name=slunes>" ;
           for($x = 0; $x < 5; $x++){

            if($horarioEmp[1] == $PUESTO[$x])
            {
                echo "<option value='" .$PUESTO[$x]. "' selected>" .$PUESTO[$x] . "</option>";
             }
            else
            {
                echo "<option value='" . $PUESTO[$x] . "'>" . $PUESTO[$x] . "</option>";
            }

          }

      echo "</select>  </td>";


// Martes
      echo  "<td> <select name=smartes class=select>" ;

      for($x = 0; $x < 5; $x++){

      if($horarioEmp[2] == $PUESTO[$x])
      {
          echo "<option value='" .$PUESTO[$x]. "' selected>" .$PUESTO[$x] . "</option>";
       }
      else
      {
          echo "<option value='" . $PUESTO[$x] . "'>" . $PUESTO[$x] . "</option>";
      }

    }

    echo "</select> </td>";


    // miercoles

    echo  "<td> <select name=smiercoles class=select>" ;

    for($x = 0; $x < 5; $x++){

    if($horarioEmp[3] == $PUESTO[$x])
    {
        echo "<option value='" .$PUESTO[$x]. "' selected>" .$PUESTO[$x] . "</option>";
     }
    else
    {
        echo "<option value='" . $PUESTO[$x] . "'>" . $PUESTO[$x] . "</option>";
    }

    }

    echo "</select> </td>";

    // Jueves

    echo  "<td> <select name=sjueves class=select>" ;

    for($x = 0; $x < 5; $x++){

    if($horarioEmp[4] == $PUESTO[$x])
    {
        echo "<option value='" .$PUESTO[$x]. "' selected>" .$PUESTO[$x] . "</option>";
      //  $sesionActual = $resultado['sesion'];
    }
    else
    {
        echo "<option value='" . $PUESTO[$x] . "'>" . $PUESTO[$x] . "</option>";
    }

    }

    echo "</select></td>";


    //viernes
    echo  "<td> <select name=sviernes class=select>" ;

    for($x = 0; $x < 5; $x++){

    if($horarioEmp[5] == $PUESTO[$x])
    {
        echo "<option value='" .$PUESTO[$x]. "' selected>" .$PUESTO[$x] . "</option>";
      //  $sesionActual = $resultado['sesion'];
    }
    else
    {
        echo "<option value='" . $PUESTO[$x] . "'>" . $PUESTO[$x] . "</option>";
    }

    }

    echo "</select></td>";

    //sabado

    echo  "<td> <select name=ssabado class=select>" ;

    for($x = 0; $x < 5; $x++){

    if($horarioEmp[6] == $PUESTO[$x])
    {
        echo "<option value='" .$PUESTO[$x]. "' selected>" .$PUESTO[$x] . "</option>";
      //  $sesionActual = $resultado['sesion'];
    }
    else
    {
        echo "<option value='" . $PUESTO[$x] . "'>" . $PUESTO[$x] . "</option>";
    }

    }

    echo "</select></td>";


    //domingo

    echo  "<td> <select name=sdomingo class=select>" ;

    for($x = 0; $x < 5; $x++){

    if($horarioEmp[7] == $PUESTO[$x])
    {
        echo "<option value='" .$PUESTO[$x]. "' selected>" .$PUESTO[$x] . "</option>";
      //  $sesionActual = $resultado['sesion'];
    }
    else
    {
        echo "<option value='" . $PUESTO[$x] . "'>" . $PUESTO[$x] . "</option>";
    }

    }

      echo "</select> </td>";

      echo "<td>"

       ?>

    <input type="submit" value="actualizar horario" name="registrar" class="btn-bClaro p-1"/>
    </form>

    <?php

    echo "</td></tr>";

  } // fin horario foreach
}
      ?>
    </tbody>
        </table>

        <br/>
       <a href='../controlador/reseteoButacas.php'><button   id="reset" class="btn-success" > Reseteo Butacas </button></a>

    </body>
