

       <h2 class="text-success text-center"><b>Cambiar Imagenes de la cartelera</b></h2>
       <br/>
<!--
       <table style="border: 1px solid black;" width="95%">

         <style>
         table, tr, th, td{
         border: 1px solid #2b351f;
         text-align: center;
         padding: 15px;
             }
         </style>
-->
         <?php
         $sala = 0;
         foreach (Img::listaImg() as $fotos) {
           //sala
           $sala++;
        //   echo "<tr>";
  //         echo  "<td><h3 class='text-success'><b>SALA " . $fotos[0] . "</b> <h3></td>";
           echo "<div class='row tablas'>";
           echo  "<div class='col-sm-8 col-md-2 border   mb-1'><h3 class='text-success'><b>SALA " . $fotos[0] . "</b> <h3></div>";

    //       echo "<td ><img src='$fotos[1]' width=200px/></td>";
           echo "<div class='col-sm-8 col-md-5 col-lg-4 border   mb-1'><img src='$fotos[1]' width=200px/></div>";
        //   echo "<td>";
           echo  "<div class='col-sm-8 col-md-5 col-lg-4  border mb-1'>";
          ?>

        <form enctype="multipart/form-data" method="post" action="../controlador/subir.php">

          <input type="hidden" name="sala" value="<?php echo $sala ?> "/>
          <label><h3 class="text-primary"><b> Elija una imagen</b></h3></label>
           <input type="file" name="img_up">
          <input value="Cambiar" type="submit"  class="btn-bClaro p-1">
        </form>
  <!--    </td></tr>    -->
</div>
</div>
        <?php
      }     // fin for recorrido tabla img
         ?>

      <!--         </table>

                 <br/>
