
  <section class="row">
  <div class="col-12 text-center mb-3">

<?php

  $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");

  $usuario = $_SESSION['usuario'];
  $userA = Users::userActual($usuario);
  $emailuser = $userA[0][2];

    echo "<h1 class='text-success'><b>COMPRAR ENTRADA </b></h1>";
  echo "</div>";   // fin titulo

//actuales
  echo "<div class='col-sm-12 col-md-5 my-3 ml-5  mx-auto'>"; //lado izquierdo- entrada actual


  echo "<h2 class='text-primary'><b>SELECCIÓN ACTUAL </b></h2>";
  echo "<hr/>";
  $nsala = 1;
 //película
if(isset($_POST['peliculaActual']))
{
    $peliculaActual = $_POST['peliculaActual'];
    $numSala = Peliculas::encuentraSala($peliculaActual);
    echo "<h3><b class='text-success'>PELICULA:</b><span class='text-primary'> " . $peliculaActual . " (Sala " . $numSala[0][0] . ")</span>  <h3>";
    $nsala = $numSala[0][0];
 }
else
{
    $_POST['peliculaActual'] = null;
    $peliA = Peliculas::nombrePeliculas();
    $nsala = 1;
    $peliculaActual = $peliA[0][0];
    echo "<h3><b class='text-success'>PELICULA:</b> <span class='text-primary'>" . $peliculaActual . " (Sala 1) </span>  <h3>";
}

//sesion
  if(isset($_POST['sesionActual']))
  {

      $sesionActual = $_POST['sesionActual'];
      echo "<h3><b class='text-success'>SESIÓN: </b> <span class='text-primary'>" . $sesionActual . "</span>  <h3>";
  }
  else
  {
      $_POST['sesionActual'] = null;

    $sessiones = Peliculas::sesionesPeliculas();
    $sesionActual = $sessiones[0][0];
      echo "<h3><b class='text-success'>SESIÓN:</b> <span class='text-primary'>" . $sesionActual . " </span> <h3>";
  }

  //dia
  if(isset($_POST['diaActual']))
  {
      $diaActual = $_POST['diaActual'];
      echo "<h3 ><b class='text-success'>DÍA: </b> <span class='text-primary'>" . $diaActual . "</span>  <h3>";
  }
  else
  {
      $_POST['diaActual'] = null;
      $diaActual = $dias[date("w")];
      echo "<h3><b class='text-success'>DÍA: </b> <span class='text-primary'>" . $diaActual . "</span>  <h3>";
  }

  echo "</div>";

  //Lado derecho, select peliculas, sesiones y dias
  echo "<div class='col-sm-12 col-md-5 my-3 ml-5  mx-auto'>";

  // menu para elegir pelicula, dia y sesión
?>
 <h2 class='text-primary'><b> ELIJA UNA OPCIÓN: </b></h2>
 <hr/>
<form method="POST" action="indexComEntrada.php" class="text-success">

  <?php

  foreach(Users::userActual($usuario) as $userA){
    $emailuser = $userA[2];

  }

    $nombrePelis = Peliculas::nombrePeliculas();

  // peliculas
      echo "<span class='h3 font-weight-bold'> Película </span>";
       echo "<select name='peliculaActual'>";



       foreach(Peliculas::nombrePeliculas() as $peliName)
       {

           if($peliculaActual == $peliName[0])
           {

               echo "<option value='" .$peliName[0] . "' selected>" . $peliName[0] . "</option>";
               $peliculaActual = $peliName[0];
           }
           else
           {
               echo "<option value='" . $peliName[0] . "'>" . $peliName[0]   . "</option>";
           }

       }

       echo "</select> </br>";


// sesion/ hora
  echo "<span class='h3 font-weight-bold'> Sesión </span>";
  echo "<select name='sesionActual'>";

  $sesionesSelect = Peliculas::sesionesPeliculas();

foreach($sesionesSelect as $sesPeli)
   {
       if($sesionActual == $sesPeli[0])
       {
           echo "<option value='" . $sesPeli[0] . "' selected>" . $sesPeli[0] . "</option>";
           $sesionActual = $sesPeli[0];
       }
       else
       {
           echo "<option value='" . $sesPeli[0] . "'>" . $sesPeli[0] . "</option>";
       }

   }

   echo "</select></br>";


   // dia de la semana

      echo "<span class='h3 font-weight-bold'> Día Semanal </span>";
       echo "<select name='diaActual'>";

        $d =  date("w");

         if( $d == 0)  // si es domingo solo podra domingo
        {
            $i = $d;
            echo "<option value='" . $dias[$i] . "' selected>" . $dias[$i] . "</option>";
            $diaActual = $dias[$i];
        }
        else{   // si es cualquier otro dia. se podra ese dia en adelante
          $i = $d;
          while($i <7)
           {
               if($diaActual == $dias[$i])
               {
                   echo "<option value='" . $dias[$i] . "' selected>" . $dias[$i] . "</option>";
                   $diaActual = $dias[$i];
               }
               else
               {
                   echo "<option value='" . $dias[$i] . "'>" . $dias[$i] . "</option>";
               }
               $i++;
           }
           if($diaActual == $dias[0])     //  el 0  domingo. siempre ira al final
           {
               echo "<option value='" . $dias[0] . "' selected>" . $dias[0] . "</option>";
               $diaActual = $dias[0];
           }
           else
           {
               echo "<option value='" . $dias[0] . "'>" . $dias[0] . "</option>";
           }
        }

        echo "</select></br>";

   ?>
   <br/>
   <input type="submit" value="Seleccione pelicula, hora y día" class="btn-primary">
   </form>
   <br/>
 </div>
 </section>

<?php

      $rutaFoto = IMG::listaImg();
      echo " <img src='../imagenes/salas_cine.jpg' width='950px' height='300px' class='col-lg-12 d-none d-md-block '/><br/>" ;    // imagen salas

      // muestra las butacas
      echo "<div class='mx-auto' id='fondo-blur'>";
      $peliculaCompra = Peliculas::dispoPeliculas($peliculaActual,$sesionActual,$diaActual);

      $sala = (int)$peliculaCompra[0][0];
      $filaReal= 0;
      $sillaReal = 0;
     if($peliculaCompra[0][0] == 1 || $peliculaCompra[0][0] == 2){      // salas 1 o 2  ( 200 butacas)

     for($fila = 0; $fila < 10; $fila++)
     {
       $filaReal = $fila;
        $f = $fila+1;
/*        if($f <10){
           echo "<span class='text-success h3' > " . $f . "</span>&nbsp&nbsp ";
         }else {
           echo "<span class='text-success h3' >" . $f . "</span> &nbsp";
         }*/
         for($silla = 0; $silla < 20; $silla++)
         {
            $sillaReal = $silla;
            if($silla == 5 || $silla == 15)     // dejar espacios vacios entre laterales y central
            {
              echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";
            }
             $posicionSilla = (($fila * 20) + $silla);
             if($peliculaCompra[0][3][$posicionSilla] == "1")
             {

               ?>


         <?php
          echo "<img  class='imgFS'  src='../imagenes/silla_libre.jpg' title='F - " . $f ." \nB - " . (int) ($silla + 1) ."' data-toggle='modal'  data-target='#myModal' data-fila='" .$fila."'  data-silla='".$silla."'>" ;


/*
                 echo "<a href='indexComprada.php?fila=" . $fila ."&sala=" . $peliculaCompra[0][0] ."&emailuser=" . $emailuser . "&silla=" . $silla . "&dia=" . $diaActual . "&sesion=" . $sesionActual .
                 "&pelicula=" . $peliculaCompra[0][1] . "&usuario=" . $usuario ."&modal=1'><img src='../imagenes/silla_libre.jpg' title='F - " . $f ." \nB - " . (int) ($silla + 1) ."'></a>";
*/
             }
             else
             {
               if($silla!=0)
               {
                   echo "&nbsp";
               }
                 echo "<img src='../imagenes/silla_ocupada.jpg'  title='ocupada'>";
             }
         }
         echo "<br>";
     }

   }else {      // salas 3-4-5-6 ( 100 butacas)

     for($fila = 0; $fila < 10; $fila++)
     {
       $f = $fila+1;
       if($f <10){
          echo "<span class='text-success h3' >Fila " . $f . "</span> &nbsp&nbsp&nbsp&nbsp&nbsp";
        }else {
          echo "<span class='text-success h3' >Fila " . $f . "</span> &nbsp";
        }
         for($silla = 0; $silla < 10; $silla++)
         {

             $posicionSilla = (($fila * 10) + $silla);
             if($peliculaCompra[0][3][$posicionSilla] == "1")
             {

               ?>

               <!-- MODAL entrada -->

               <?php
               /*
               echo "<img src='../imagenes/silla_libre.jpg' title='F - " . $f ." \nB - " . (int) ($silla + 1) ."' data-toggle='modal' data-target='#myModal'>" ;
*/
              echo "<img  class='imgFS'  src='../imagenes/silla_libre.jpg' title='F - " . $f ." \nB - " . (int) ($silla + 1) ."' data-toggle='modal'  data-target='#myModal' data-fila='" .$fila."'  data-silla='".$silla."'>" ;

               ?>


               <?php

/*

                 echo "<a href='indexComprada.php?fila=" . $fila ."&sala=" . $peliculaCompra[0][0] ."&emailuser=" . $emailuser . "&silla=" . $silla .
                 "&dia=" . $diaActual . "&sesion=" . $sesionActual ."&pelicula=" . $peliculaCompra[0][1] . "&usuario=" . $usuario ."&modal=1'><img src='../imagenes/silla_libre.jpg' title='F - " . $f ." \nB - " . (int) ($silla + 1) ."'></a>";
                 echo "&nbsp";

*/

             }
             else
             {
               if($silla==0)
               {
                   echo "&nbsp";
               }
                 echo "<img src='../imagenes/silla_ocupada.jpg' title='ocupada'>";
              }
         }
         echo "<br>";
     }

   }
   echo "<br>";
  echo "<div>";

    echo " <img src='". $rutaFoto[$nsala-1][1]. "' width='950px' height='350px' class='col-lg-12 d-none d-md-block '/><br/>" ;    // imagen pelicula actual



?>


<!-- Modal -->
<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h3 class="modal-title text-danger" id="myModalLabel">Pago con tarjeta</h3>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <!-- formulario modal -->
     <form role="formx"  action="indexComprada.php"  method="POST" class="credit-card-div">
       <div class="panel panel-default" >
        <div class="panel-heading">

          <div>
            <input type="hidden" id="fmodal" name="fila" value="" />   <!-- paso valor con js de la imagen actual -->
            <input type="hidden" name="sala" value="<?php  echo $peliculaCompra[0][0] ?>" />
            <input type="hidden" name="emailuser" value="<?php  echo $emailuser ?>" />
            <input type="hidden" id="smodal" name="silla" value="" />     <!-- paso valor con js de la imagen actual -->
            <input type="hidden" name="dia" value="<?php  echo $diaActual ?>" />
            <input type="hidden" name="sesion" value="<?php  echo $sesionActual ?>" />
            <input type="hidden" name="pelicula" value="<?php  echo $peliculaCompra[0][1] ?>" />
            <input type="hidden" name="usuario" value="<?php  echo $usuario ?>" />
            <input type="hidden" name="modal" value="0" />

          </div>

          <div class="row ">
                  <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="Introduce número tarjeta" pattern="[0-9]{13,18}" maxlength="18" required />
                  </div>
         </div>
         <div class="row ">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                      <span class="help-block text-muted small-font" > Mes cad.</span>
                      <input type="text" class="form-control" placeholder="MM" pattern="[0-2]{2}" maxlength="2" required/>
                  </div>
             <div class="col-md-3 col-sm-3 col-xs-3">
                      <span class="help-block text-muted small-font" >  Año cad.</span>
                      <input type="text" class="form-control" placeholder="YY" pattern="[0-9]{2}" maxlength="2" required/>
                  </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                   <span class="help-block text-muted small-font" >  CCV</span>
                   <input type="text" class="form-control" placeholder="CCV"  pattern="[0-9]{3}" maxlength="3" required/>
            </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <img src="../imagenes/tarjeta.jpg" class="img-rounded mt-4" />
                </div>
                 </div>

            <div class="row">
       <div class="col-md-12 pad-adjust">
           <div class="checkbox">
           <label>
             <input type="checkbox" checked class="text-muted"> Guardar datos de tarjeta
           </label>
         </div>
       </div>
            </div>
              <div class="row ">
                   <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                     </div>
                     <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                         <input type="submit"  class="btn btn-warning btn-block" value="PAGAR" />
                     </div>
                 </div>

         </div>
  </div>
</form>


       <!-- formulario modal -->

 </div>

   </div>
 </div>
</div>
