
    <body>
         <?php

        ?>
        <br/>

        <br/>
        <table style="border: 1px solid black;" width="95%">
          <tr>
            <th style="border: 1px solid black;"><b>SALA</b></th>
            <th style="border: 1px solid black;"><b>NOMBRE PELICULA</b></th>
            <th style="border: 1px solid black;"><b>DESCRIPCION</b></th>


          </tr>

          <style>
          table, tr, th, td{
          border: 1px solid #000000;
          text-align: center;
              }
          </style>

          <?php

           foreach (Peliculas::listaPeliculas() as $pelis) {

             echo "<tr>";

            ?>
            <form name = "formulario" method="POST" action= '../controlador/actualizarPeli.php'>
            <input type="hidden" name="sala" value="<?php  echo $pelis[0] ?> " />

            <?php

            echo "<td ><b>" . $pelis[0] . "</b> </td>" ;
        //  echo "<td ><input type='text' name=peli value =" . $pelis[1] . "></td>" ;

            echo "<td ><textarea name=peli value =" . $pelis[1] . " rows='1' cols='15'>" . $pelis[1] ."</textarea></td>" ;
            echo "<td> <textarea name=descripcion value =" . $pelis[2] . " cols='30'>"  . $pelis[2] ."</textarea></td>";

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
