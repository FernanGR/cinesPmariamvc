<?php
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/peliculaDao.php';
  require_once '../dao/horarioDao.php';

 ?>

<!DOCTYPE html>
<html>
 <head>
   <title> Cines PMaria </title>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 </head>
<body>
  <img src="../imagenes/cines_pmaria.jpg"/>
  <br/>
<?php
  session_start();
  if(!isset($_SESSION['usuario']))
  {
      header("Location:login.php");
  }

  $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
  echo "<h2>Buenos días, hoy es ".$dias[date("w")] . " y la hora es " . date("h") . " <h2>";

  //$usuario = $_SESSION['usuario'];
  $usuario = $_GET['usuario'];
  echo "¡Bienvenido, <b> " . $usuario . "!</b>";
  echo "(<a href='../controlador/logout.php'>logout </a> )";

  echo "<h1>Comprar entradas</h1>";



//$conexion = new mysqli('localhost','root','','cinespmaria');

//$sesionUser = $_SESSION['usuario'];
$sesionUser = $usuario;

//$userActual = Users::userActual($sesionUser);
foreach(Users::userActual($usuario) as $userA){
  $emailuser = $userA[2];

}
//email
//$consulta = $conexion->query("SELECT * FROM usuarios where usuario = '"  . $_SESSION['usuario']. "'"   );
//$resultado = $consulta->fetch_assoc();
//$emailuser = $resultado['email'];

//pelicula
if(isset($_GET['peliculaActual']))
{
    $peliculaActual = $_GET['peliculaActual'];
    echo "<h2>PELICULA: " . $peliculaActual . "  <h2>";
}
else
{
    $_GET['peliculaActual'] = null;
  //  $consulta = $conexion->query('SELECT nombre FROM peliculas');
  //  $resultado = $consulta->fetch_assoc();
  //  $peliculaActual = $resultado['nombre'];
  $peliA = Peliculas::nombrePeliculas();

  $peliculaActual = $peliA[0][0];
    echo "<h2>PELICULA: " . $peliculaActual . "  <h2>";
}

//sesion
  if(isset($_GET['sesionActual']))
  {
      $sesionActual = $_GET['sesionActual'];
      echo "<h2>SESIÓN: " . $sesionActual . "  <h2>";
  }
  else
  {
      $_GET['sesionActual'] = null;
    //  $consulta = $conexion->query('SELECT sesion FROM peliculas');
  //    $resultado = $consulta->fetch_assoc();
    //  $sesionActual = $resultado['sesion'];
    $sessiones = Peliculas::sesionesPeliculas();
    $sesionActual = $sessiones[0][0];
      echo "<h2>SESIÓN: " . $sesionActual . "  <h2>";
  }

  //dia
  if(isset($_GET['diaActual']))
  {
      $diaActual = $_GET['diaActual'];
      echo "<h2>Día: " . $diaActual . "  <h2>";
  }
  else
  {
      $_GET['diaActual'] = null;
    //  $consulta = $conexion->query('SELECT dia FROM peliculas');
    //  $resultado = $consulta->fetch_assoc();
      $diaActual = $dias[date("w")];
      echo "<h2>Día: " . $diaActual . "  <h2>";
  }
  echo " <img src='../imagenes/salas_cine.jpg'/><br/>" ;


  //   $conexion = new mysqli('localhost','root','','cinespmaria');
  //   $resultados = $conexion->query("SELECT * FROM peliculas where nombre = '". $peliculaActual . "' and  sesion = '". $sesionActual ."'   and  dia = '". $diaActual ."'");
  //   $resultado = $resultados->fetch_assoc();
    $peliculaCompra = Peliculas::dispoPeliculas($peliculaActual,$sesionActual,$diaActual);

     //$sala = (int)$resultado["sala"];
     $sala = (int)$peliculaCompra[0][0];

     if($peliculaCompra[0][0] == 1 || $peliculaCompra[0][0] == 2){
  /*     echo "&nbsp";
       echo "&nbsp";
       echo "&nbsp";
       echo "&nbsp";
       echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";

       for($s = 1; $s<21; $s++){
         echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp";
         if($s == 6 || $s == 16)  {
           echo "&nbsp";   echo "&nbsp";   echo "&nbsp";   echo "&nbsp";  echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";
         }
          echo $s;
       }
         echo "<br/>";*/
     for($fila = 0; $fila < 10; $fila++)
     {

        $f = $fila+1;
        echo "Fila " . $f . "&nbsp";

         for($silla = 0; $silla < 20; $silla++)
         {
            if($silla == 5 || $silla == 15)     // dejar espacios vacios entre laterales y central
            {
              echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";
            }
             $posicionSilla = (($fila * 20) + $silla);
             if($peliculaCompra[0][3][$posicionSilla] == "1")
             {
                 echo "<a href='comprada.php?fila=" . $fila ."&sala=" . $peliculaCompra[0][0] ."&emailuser=" . $emailuser . "&silla=" . $silla . "&dia=" . $diaActual . "&sesion=" . $sesionActual ."&pelicula=" . $peliculaCompra[0][1] . "&usuario=" . $usuario . "'><img src='../imagenes/silla_libre.jpg'></a>";
                 echo "&nbsp";
             }
             else
             {
                 echo "<img src='../imagenes/silla_ocupada.jpg'>";
                 echo "&nbsp";
             }
         }
         echo "<br>";
     }

   }else {
  /*    echo "&nbsp";
      echo "&nbsp";
      echo "&nbsp";
      echo "&nbsp";
      echo "&nbsp";
     for($s = 1; $s<11; $s++){
       echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp"; echo "&nbsp";echo "&nbsp";

        echo $s;
     }
       echo "<br/>";*/
     for($fila = 0; $fila < 10; $fila++)
     {
       $f = $fila+1;
       echo "Fila " . $f . "&nbsp";

         for($silla = 0; $silla < 10; $silla++)
         {



             $posicionSilla = (($fila * 10) + $silla);
             if($peliculaCompra[0][3][$posicionSilla] == "1")
             {
                 echo "<a href='comprada.php?fila=" . $fila ."&sala=" . $peliculaCompra[0][0] ."&emailuser=" . $emailuser . "&silla=" . $silla . "&dia=" . $diaActual . "&sesion=" . $sesionActual ."&pelicula=" . $peliculaCompra[0][1] . "&usuario=" . $usuario . "'><img src='../imagenes/silla_libre.jpg'></a>";
                 echo "&nbsp";
             }
             else
             {
                 echo "<img src='../imagenes/silla_ocupada.jpg'>";
                 echo "&nbsp";
             }
         }
         echo "<br>";
     }

   }
   echo "<br>";


?>
  <form method="get" action="<?php echo $_SERVER['PHP_SELF'] ; ?>">
  <input type="hidden" name="usuario" value="<?php  echo $usuario ?> " />
    <?php
  //  $consulta = $conexion->query("SELECT email FROM usuarios where usuario = '"  . $_SESSION['usuario']. "'"   );
  //  $resultado = $consulta->fetch_assoc();
  //  $emailuser = $resultado['email'];
    $sesionUser = $usuario;


    //$userActual = Users::userActual($sesionUser);
    foreach(Users::userActual($sesionUser) as $userA){
      $emailuser = $userA[2];

    }
    //$emailuser = $_GET['emailuser']; // para pasar email del usuario

  //  $conexion = new mysqli('localhost','root','','cinespmaria');
  //  $resultados = $conexion->query("SELECT DISTINCT nombre FROM peliculas");
      $nombrePelis = Peliculas::nombrePeliculas();

    // peliculas
        echo "Película ";
         echo "<select name='peliculaActual'>";

        // while($resultado = $resultados->fetch_assoc())
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
             // modo vision solo 1 de cada
        /*     for($y = 0; $y<20; $y++){
               $resultado = $resultados->fetch_assoc();
             }*/
         }

         echo "</select> </br>";


    //$conexion = new mysqli('localhost','root','','cinespmaria');
    //$resultados = $conexion->query("SELECT DISTINCT sesion FROM peliculas");



// sesion/ hora
    echo "Sesión ";
    echo "<select name='sesionActual'>";

    //while($resultado = $resultados->fetch_assoc())
  //  $i = 1;
  //  $resultado = $resultados->fetch_assoc();

  //  while($i <4)
  foreach(Peliculas::sesionesPeliculas() as $sesPeli)
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
      //   $i++;
    //     $resultado = $resultados->fetch_assoc();

     }

     echo "</select></br>";


     // dia de la semana
    // $conexion = new mysqli('localhost','root','','cinespmaria');
    // $resultados = $conexion->query("SELECT dia FROM peliculas");

         echo "Día Semana";
         echo "<select name='diaActual'>";


          $d =  date("w");

          //$i = 0;
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
             if($diaActual == $dias[0])
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

     <input type="submit" value="Seleccionar pelicula, hora y día">
     </form>
     <a href='../index.php?user=<?php echo $usuario ?>&rol=ROL_USER'><button>Volver al Menu</button></a>

</body>
</html>
