
        <br/>
        <h2 class="text-success text-center"><b> Editar Película	</b></h2>
        <br/>
        <table style="border: 1px solid black;" width="95%">
          <tr>
            <th style="border: 1px solid black;" class="p-1 text-blue"><b>SALA</b></th>
            <th style="border: 1px solid black;" class=" text-blue"><b>NOMBRE PELICULA</b></th>
            <th style="border: 1px solid black;" class=" text-blue"><b>DESCRIPCION</b></th>
            <th style="border: 1px solid black;" class=" text-blue"><b>ACCIÓN</b></th>
            <th style="border: 1px solid black;" class=" text-blue px-1"><b>PUNTUACIONES</b></th>

          </tr>

          <style>
          table, tr, th, td{
          border: 1px solid #2b351f;
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

            echo "<td class='p-1' ><textarea name=peli value =" . $pelis[1] . " rows='1' cols='15'>" . $pelis[1] ."</textarea></td>" ;
            echo "<td> <textarea name=descripcion value =" . $pelis[2] . " cols='30' style='width:300px'>"  . $pelis[2] ."</textarea></td>";

            echo "<td>"

             ?>

          <input type="submit" value="Actualizar pelicula" name="editPeli" class="btn-bClaro m-1"/>
          </form>

        <?php

        echo "</td>";
        echo "<td>";  // MUESTRA puntuacion y boton reseteo
        $cont = 0;
        $valoracion = 0;
        $vPeli = Puntuacion::puntuacionPeli($pelis[1]);
        if($vPeli != null){
        foreach($vPeli as $vPelicula){
          $valoracion = $valoracion + (int)($vPelicula[2]);
          $cont +=1;
        }
        $valFinal = (double)($valoracion/$cont);
         echo "<h4 class='text-blue'>  " . round($valFinal,1) ."</h4>";

      }else{
        echo "<h4 class='text-blue'>  Sin Valorar</h4>";

      }

      ?>
        <form name = "formulario" method="POST" action= '../controlador/resetPuntuacion.php'>
          <input type="hidden" name="pelicula" value="<?php  echo $pelis[1] ?> " />

          <input type="submit" value="Resetear" name="resetPuntuacion" class="btn-rClaro m-1"/>
        </form>

    <?php

      echo "</td>";

        echo "</tr>";

              }

 ?>
</table>
