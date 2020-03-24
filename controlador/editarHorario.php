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
        //  $conexion = new mysqli('localhost','root','','cinespmaria');
        //  $resultados = $conexion->query("SELECT * FROM usuarios WHERE rol LIKE 'ROL_EMP'");
        //  $horarios = $conexion->query("SELECT * FROM horarios");
           $PUESTO = ['Libre', 'Puerta', 'Bar', 'Taquilla', 'Refuerzo'];


          //while($resultado = $resultados->fetch_assoc()){
          foreach (Users::listaEmpleados() as $resultado) {
           ?>
            <tr>
              <form name = "formulario" method="GET" action= 'actualizarHorario.php'>
              <input type="hidden" name="emp" value="<?php  echo $resultado[5] ?> " />


          <?php
          /*<input type="hidden" name="slunes" value="<?php  echo $slunes ?> " />*/
            echo  "<td><b>" . $resultado[0] . "</b> </td>";

      //  $horarioEmp = $conexion->query("SELECT * FROM horarios where horario = " . $resultado[5]);
      // while($horarioEmp = $horarioEmp->fetch_assoc()){
     //  $horarioEmp = $horarioEmp->fetch_assoc();
      $hor = $resultado[5];
    //  $horarioEmp2 = Horario::listaHorEmp($hor);
      foreach (Horario::listaHorEmp($hor) as $horarioEmp){
    //   $horarioEmp = Horario::listaHorEmp($hor);
      //echo "<td>" . $horarioEmp['lunes'] . "</td>";
        echo  "<td> <select name=slunes>" ;
    //  echo  "<td>" . $horarioEmp2[0] . "</td>";
          for($x = 0; $x < 5; $x++){

            if($horarioEmp[1] == $PUESTO[$x])
            {
                echo "<option value='" .$PUESTO[$x]. "' selected>" .$PUESTO[$x] . "</option>";
              //  $slunes = $PUESTO[$x];
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
        //  $sesionActual = $resultado['sesion'];
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
      //  $sesionActual = $resultado['sesion'];
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

    <input type="submit" value="actualizar horario" name="registrar"/>
    </form>

    <?php

    echo "</td></tr>";

  } // fin horario foreach
}
      ?>

        </table>

        <br/>

    </body>
</html>
