
    <body>
     <?php

      ?>

       <h2>Cambiar Imagenes de las películas de las salas </h2>
       <br/>

       <table style="border: 1px solid black;" width="95%">
         <tr>
           <th style="border: 1px solid black;"><b>Sala</b></th>
           <th style="border: 1px solid black;"><b>Foto</b></th>
           <th style="border: 1px solid black;"><b>Cambiar Foto</b></th>

         </tr>

         <style>
         table, tr, th, td{
         border: 1px solid #000000;
         text-align: center;
             }
         </style>

         <?php
         $sala = 0;
         foreach (Img::listaImg() as $fotos) {
           //sala 1
           $sala++;
           echo "<tr>";
           echo  "<td><b>" . $fotos[0] . "</b> </td>";
           echo "<td><img src='$fotos[1]' width=200px/></td>";
           echo "<td>";
          ?>

        <form enctype="multipart/form-data" method="post" action="../controlador/subir.php">

          <input type="hidden" name="sala" value="<?php echo $sala ?> "/>
           <input type="file" name="img_up">
          <input value="Cambiar" type="submit">
        </form>
      </td></tr>

        <?php
      }     // fin for recorrido tabla img
         ?>

               </table>

                 <br/>
    </body>
</html>
