
    <body>
         <?php

        ?>
        <br/>
 
          <?php
            $infoPelis = Peliculas::listaPeliculas();
            $fotoPelis = Img::listaImg();

           //foreach (Peliculas::listaPeliculas() as $pelis) {
           for($i = 0; $i<6;$i++){


            ?>


            <?php
            echo "<h1>Sala " .$infoPelis[$i][0]."</h1><br/>";
            echo "<h2>".$infoPelis[$i][1]."</h2><br/>";
            echo "<img src='".$fotoPelis[$i][1]."' width=200px/><br/>";
            echo "<h3>".$infoPelis[$i][2]."</h3><br/>";

             ?>


          <?php

          echo "</td></tr>";

        }

 ?>
     </body>
