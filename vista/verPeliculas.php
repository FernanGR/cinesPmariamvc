<?php
  require_once '../dao/peliculaDao.php';
  require_once '../modelo/conexion.php';
  //require_once '../modelo/userModel.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cines Peliculas</title>
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
            <th style="border: 1px solid black;"><b>SALA</b></th>
            <th style="border: 1px solid black;"><b>PELICULA</b></th>
            <th style="border: 1px solid black;"><b>DESCRIPCION</b></th>


          </tr>

          <style>
          table, tr, th, td{
          border: 1px solid #000000;
          text-align: center;
              }
          </style>

          <?php

           foreach (Peliculas::listaPeliculas() as $resultado) {

             echo "<tr>";

            ?>
            <form name = "formulario" method="GET" action= '../controlador/actualizarPeli.php'>
            <input type="hidden" name="sala" value="<?php  echo $resultado[0] ?> " />


            <?php

            echo "<td ><b>" . $resultado[0] . "</b> </td>" ;
            echo "<td ><input name=peli value =" . $resultado[1] . "> </td>" ;
            echo "<td> <textarea name=descripcion value =" . $resultado[2] . ">" . $resultado[2] ."</textarea></td>";

            echo "<td>"

             ?>

          <input type="submit" value="Actualizar pelicula" name="editPeli"/>
          </form>

        <?php

        echo "</td></tr>";

              }

 ?>
</table>
    </body>
</html>
