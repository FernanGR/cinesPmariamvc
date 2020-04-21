
    <body>

        <br/>

          <?php
            $infoPelis = Peliculas::listaPeliculas();
            $fotoPelis = Img::listaImg();

           //foreach (Peliculas::listaPeliculas() as $pelis) {
           for($i = 0; $i<6;$i++){


            ?>

            <div class="row my-3">
              <div class="col-sm-12 col-md-6">    <!-- número sala -->
                  <?php
                       echo "<h1 class='text-success'><b>Sala " .$infoPelis[$i][0]."</b></h1> ";
                   ?>
                </div>

                <div class="col-sm-12 col-md-6">    <!-- nombre de película -->
                  <?php
                     echo "<h2><b>".$infoPelis[$i][1]."</b></h2> ";

                      if(isset($_SESSION['usuario'])){ // si estas logueado
                        // formulario para valorar peliculas
                   ?>

                   <form name = "formulario" method="POST" action= '../controlador/actualizarPuntuacion.php'>
                     <input type="hidden" name="pelicula" value="<?php  echo $infoPelis[$i][1] ?> " />
                     <input type="hidden" name="usuario" value="<?php  echo $_SESSION['usuario'] ?> " />

                     <label for="puntua" class="text-info h3">Valoración </label>
                     <select   name="puntuacion">
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option>
                       <option value="10">10</option>

                     </select>
                    <input type="submit" value="Enviar" class="btn-rClaro">
                  </form>

                  <?php
                }   // fin if
                   ?>


                </div>



                <div class="col-sm-12 col-md-6 mt-3">   <!-- imagen de película -->
                  <?php
                     echo "<img src='".$fotoPelis[$i][1]."' width=200px/><br/>";
                   ?>
                </div>
                <div class="col-sm-12 col-md-6 mt-3">   <!-- descripción de la película -->
                  <?php
                     echo "<h3>".$infoPelis[$i][2]."</h3><br/>";
                     $cont = 0;
                     $valoracion = 0;
                     $vPeli = Puntuacion::puntuacionPeli($infoPelis[$i][1]);
                     if($vPeli != null){
                     foreach($vPeli as $vPelicula){
                       $valoracion = $valoracion + (int)($vPelicula[2]);
                       $cont +=1;
                     }
                     $valFinal = (double)($valoracion/$cont);
                     echo "<h4 class='text-blue'> Votos: " . $cont ."</h4>";
                     echo "<h4 class='text-blue'> Puntuacion: " . round($valFinal,1) ."</h4>";

                   }else{
                     echo "<h4 class='text-blue'> Puntuacion: Sin Valorar</h4>";

                   }
                   ?>

                </div>
            </div>






            <?php
            /*
            echo " <table>";
            echo "<tr><td width='40%'>";
            echo "<h1><b>Sala " .$infoPelis[$i][0]."</b></h1> ";
            echo "</td><td style='text-align:left;'>";
            echo "<h2><b>".$infoPelis[$i][1]."</b></h2> ";
            echo "</td></tr>";
            echo "<tr><td colspan='2' style='text-align:center;'>";
            echo "<img src='".$fotoPelis[$i][1]."' width=200px/><br/>";
            echo "</td></tr>";
            echo "<tr><td colspan='2' style='text-align:center;'>";
            echo "<h3>".$infoPelis[$i][2]."</h3><br/>";
            echo "</td></tr>";
            echo "</table>";
*/
             ?>


          <?php

        //  echo "</td></tr>";

        }

 ?>

      </body>
