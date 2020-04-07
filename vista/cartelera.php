
    <body>

        <br/>

          <?php
            $infoPelis = Peliculas::listaPeliculas();
            $fotoPelis = Img::listaImg();

           //foreach (Peliculas::listaPeliculas() as $pelis) {
           for($i = 0; $i<6;$i++){


            ?>


            <?php
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

             ?>


          <?php

          echo "</td></tr>";

        }

 ?>

      </body>
