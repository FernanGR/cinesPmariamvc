
  <section class="row">
  <div class="col-12 text-center mb-3">

<?php

  $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");

  $usuario = $_SESSION['usuario'];
  $userA = Users::userActual($usuario);
  $emailuser = $userA[0][2];
/*
   echo "<h1>¡Bienvenido, <b> " . $usuario . "!</b></h1><br/>";
  echo "<h2>Buenos días, hoy es ".$dias[date("w")] . ".<h2>";
  */
  echo "<h1 class='text-success'><b>COMPRAR ENTRADA </b></h1>";
  echo "</div>";   // fin titulo

//actuales
  echo "<div class='col-sm-12 col-md-5 my-3 ml-5  mx-auto'>"; //lado izquierdo- entrada actual


  echo "<h2 class='text-primary'><b>SELECCIÓN ACTUAL </b></h2>";
  echo "<hr/>";
  $nsala = 1;
 //película
if(isset($_GET['peliculaActual']))
{
    $peliculaActual = $_GET['peliculaActual'];
    $numSala = Peliculas::encuentraSala($peliculaActual);
    echo "<h3><b class='text-success'>PELICULA:</b><span class='text-primary'> " . $peliculaActual . " (Sala " . $numSala[0][0] . ")</span>  <h3>";
    $nsala = $numSala[0][0];
 }
else
{
    $_GET['peliculaActual'] = null;
    $peliA = Peliculas::nombrePeliculas();
    $nsala = 1;
  $peliculaActual = $peliA[0][0];
    echo "<h3><b class='text-success'>PELICULA:</b> <span class='text-primary'>" . $peliculaActual . " (Sala 1) </span>  <h3>";
}

//sesion
  if(isset($_GET['sesionActual']))
  {
      $sesionActual = $_GET['sesionActual'];
      echo "<h3><b class='text-success'>SESIÓN: </b> <span class='text-primary'>" . $sesionActual . "</span>  <h3>";
  }
  else
  {
      $_GET['sesionActual'] = null;

    $sessiones = Peliculas::sesionesPeliculas();
    $sesionActual = $sessiones[0][0];
      echo "<h3><b class='text-success'>SESIÓN:</b> <span class='text-primary'>" . $sesionActual . " </span> <h3>";
  }

  //dia
  if(isset($_GET['diaActual']))
  {
      $diaActual = $_GET['diaActual'];
      echo "<h3 ><b class='text-success'>DÍA: </b> <span class='text-primary'>" . $diaActual . "</span>  <h3>";
  }
  else
  {
      $_GET['diaActual'] = null;
      $diaActual = $dias[date("w")];
      echo "<h3><b class='text-success'>DÍA: </b> <span class='text-primary'>" . $diaActual . "</span>  <h3>";
  }

  echo "</div>";

  //Lado derecho, elección peliculas, sesiones y dias
  echo "<div class='col-sm-12 col-md-5 my-3 ml-5  mx-auto'>";

  // menu para elegir pelicula, dia y sesión
?>
 <h2 class='text-primary'><b> Elija una opción: </b></h2>
 <hr/>
<form method="GET" action="indexComEntrada.php" class="text-success">

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

     if($peliculaCompra[0][0] == 1 || $peliculaCompra[0][0] == 2){

     for($fila = 0; $fila < 10; $fila++)
     {

        $f = $fila+1;
        if($f <10){
           echo "<span class='text-success h3' >Fila " . $f . "</span> &nbsp&nbsp&nbsp&nbsp&nbsp";
         }else {
           echo "<span class='text-success h3' >Fila " . $f . "</span> &nbsp";
         }
         for($silla = 0; $silla < 20; $silla++)
         {
            if($silla == 5 || $silla == 15)     // dejar espacios vacios entre laterales y central
            {
              echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";
            }
             $posicionSilla = (($fila * 20) + $silla);
             if($peliculaCompra[0][3][$posicionSilla] == "1")
             {
                 echo "<a href='indexComprada.php?fila=" . $fila ."&sala=" . $peliculaCompra[0][0] ."&emailuser=" . $emailuser . "&silla=" . $silla . "&dia=" . $diaActual . "&sesion=" . $sesionActual .
                 "&pelicula=" . $peliculaCompra[0][1] . "&usuario=" . $usuario . "'><img src='../imagenes/silla_libre.jpg' title='F - " . $f ." \nB - " . (int) ($silla + 1) ."'></a>";

             }
             else
             {
                 echo "<img src='../imagenes/silla_ocupada.jpg'  title='ocupada'>";
              }
         }
         echo "<br>";
     }

   }else {

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
                 echo "<a href='indexComprada.php?fila=" . $fila ."&sala=" . $peliculaCompra[0][0] ."&emailuser=" . $emailuser . "&silla=" . $silla .
                 "&dia=" . $diaActual . "&sesion=" . $sesionActual ."&pelicula=" . $peliculaCompra[0][1] . "&usuario=" . $usuario .
                 "'><img src='../imagenes/silla_libre.jpg' title='F - " . $f ." \nB - " . (int) ($silla + 1) ."'></a>";
                 echo "&nbsp";
             }
             else
             {
                 echo "<img src='../imagenes/silla_ocupada.jpg' title='ocupada'>";
                 echo "&nbsp";
             }
         }
         echo "<br>";
     }

   }
   echo "<br>";
  echo "<div>";

    echo " <img src='". $rutaFoto[$nsala-1][1]. "' width='950px' height='350px' class='col-lg-12 d-none d-md-block '/><br/>" ;    // imagen pelicula actual



?>
