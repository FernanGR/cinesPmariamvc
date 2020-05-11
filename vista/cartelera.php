
    <body>

        <br/>

          <?php
            $infoPelis = Peliculas::listaPeliculas();
            $fotoPelis = Img::listaImg();

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

                     <label for="puntua" class="text-info h3">Valoración</label>
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

                <script>
                    var x = [];
                    var y = [];
                    var c = 1;
                </script>

                <div class="col-sm-12 col-md-6 mt-3">   <!-- imagen de película -->
                  <?php
                     echo "<img src='".$fotoPelis[$i][1]."' width=200px/><br/>";
                   ?>
                </div>
                <div class="col-sm-12 col-md-6 mt-3">   <!-- Valoración de la película -->
                    <?php
                     echo "<h5 class='text-justify'>".$infoPelis[$i][2]."</h5><br/>";
                    echo "<a href=" . $infoPelis[$i][3] ." target='_blank' class='btn btn-info mb-1' >Trailer</a>";

                     $cont = 0;
                     $valoracion = 0;
                     $vPeli = Puntuacion::puntuacionPeli($infoPelis[$i][1]);
                     if($vPeli != null){
                     foreach($vPeli as $vPelicula){
                       $valoracion = $valoracion + (int)($vPelicula[2]);
                       $cont +=1;
                        ?>
                          <script>
                              y.push('<?php echo (int)($vPelicula[2]) ?>');
                              x.push(c++);
                          </script>
                        <?php
                     }


                     $valFinal = (double)($valoracion/$cont);
                     echo "<h4 class='text-blue'> Votos: " . $cont ."</h4>";
                     echo "<h4 class='text-blue'> Puntuacion: " . round($valFinal,1) ."</h4>";
                     echo "<div class='valPeli'>";
                     echo "<input type='button' class='btn-success px-1' value='Estadisticas Valoración'>";

                     ?>

                       <div id="<?php echo $infoPelis[$i][1] ?>" class="histograma"  ></div>
                   </div>
                     <script>
                           var histograma = [
                             {
                               x,
                               y,
                               type: 'bar',
                           }
                           ];
                           var layout = {
                             plot_bgcolor: " #f4f6f6",   // eaffe0
                             paper_bgcolor: '#f4f6f6',
                              autosize: false,
                              width: 350,
                              height: 350,
                            title:{
                                          fillcolor: '##A52A2A',
                            text: '<b>Histograma de votos</b>',
                            font: {
                               family: 'Courier New, monospace',
                               size: 18,
                               color: ' #295af5  '
                              }
                            },
                            xaxis: {

                              title: {
                                text: 'Núm. Votos',
                                font: {
                                  family: 'Courier New, monospace',
                                  size: 12,
                                  color: ' #0da51b  '
                                }
                              },
                            },
                            yaxis: {
                              title: {
                                text: 'Votos',
                                font: {
                                  family: 'Courier New, monospace',
                                  size: 12,
                                  color: ' #0da51b  '
                                }
                              }
                            }
                        };

                           Plotly.newPlot('<?php echo $infoPelis[$i][1] ?>', histograma, layout );
                           x = [];
                           y = [];
                     </script>
                     <?php

                   }else{
                     echo "<h4 class='text-blue'> Puntuacion: Sin Valorar</h4>";

                   }
                     echo "</div>";
                   ?>

                </div>
            </div>

          <?php


        }

 ?>

      </body>
