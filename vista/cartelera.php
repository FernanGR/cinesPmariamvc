
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
            echo "<tr><td>";
            echo "<h1>Sala " .$infoPelis[$i][0]."</h1> ";
            echo "</td><td>";
            echo "<h2>".$infoPelis[$i][1]."</h2> ";
            echo "</td></tr>";
            echo "<tr><td>";
            echo "<img src='".$fotoPelis[$i][1]."' width=200px/><br/>";
            echo "</td></tr>";
            echo "<tr><td>";
            echo "<h3>".$infoPelis[$i][2]."</h3><br/>";
            echo "</td></tr>";
            echo "</table>";

             ?>


          <?php

          echo "</td></tr>";

        }

 ?>

      </body>
