<?php
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/peliculaDao.php';
  require_once '../dao/horarioDao.php';

 ?>

 <!DOCTYPE html>
<html>
    <head>
        <title>cine Compra</title>
    </head>
    <body>
        <img src="../imagenes/cines_pmaria.jpg"/>

        <?php

        $fila = (int)$_GET['fila'];
        $silla = (int)$_GET['silla'];
        $sesion = $_GET['sesion'];
        $pelicula = $_GET['pelicula'];
        $sala = (int) $_GET['sala'];
        $usuario = $_GET['usuario'];
        $dia = $_GET['dia'];
        $emailuser = $_GET['emailuser'];

        if($sala == 1 || $sala == 2){
          $sillaElegida = ($fila * 20) + $silla;
        }else{
          $sillaElegida = ($fila * 10) + $silla;
        }

      //  $conexion = new mysqli('localhost','root','','cinespmaria');
      // $consulta = $conexion->query("SELECT * FROM peliculas WHERE nombre = '" . $pelicula. "' and dia = '" . $dia . "' and sesion ='" . $sesion . "'");
      //  $resultado = $consulta->fetch_assoc();
       $peli = Peliculas::dispoPeliculas($pelicula,$sesion,$dia);
        $disponibilidad = $peli[0][3];
        for($i = 0; $i < strlen($disponibilidad); $i++)
        {
          if($i == $sillaElegida)
            {
                $disponibilidad[$i] = 0;
            }
        }

      //  $conexion = new mysqli('localhost','root','','cinespmaria');
      //  $consulta = $conexion->query("UPDATE peliculas SET disponibilidad = '" . $disponibilidad . "' WHERE nombre = '" . $pelicula. "'  and dia = '" . $dia . "' and sesion = '" . $sesion . "'");
      Peliculas::actualizaButacas($disponibilidad,$pelicula,$sesion,$dia);

        echo "<h2>¡Enhorabuena!</h2><br>";
        echo "Has adquirido una entrada. Para descargarla, haz click <a href='../controlador/pdfentrada.php?fila=" . ($fila + 1) . "&sala=" . $sala . "&pelicula=" . $pelicula . "&dia=" . $dia.  "&silla=" . ($silla + 1) . "&sesion=" . $sesion . "&usuario=" . $usuario . "'>AQUÍ</a><br><br>";

        echo "Pulsa aqui para recibir la entrada a tu email: ";
         ?>
            <form name = "formulario" method="GET" action='../controlador/pdfentradaemail.php'>


            <!-- para pasar las variables con el formulario -->
               <input type="hidden" name="fila" value="<?php  echo ($fila + 1) ?> " />
              <input type="hidden" name="silla" value="<?php  echo ($silla + 1) ?> " />
              <input type="hidden" name="sala" value="<?php  echo $sala ?> " />
              <input type="hidden" name="dia" value="<?php  echo $dia ?> " />
              <input type="hidden" name="sesion" value="<?php  echo $sesion ?> " />
              <input type="hidden" name="pelicula" value="<?php  echo $pelicula ?> " />
              <input type="hidden" name="usuario" value="<?php echo $usuario ?> " />
              <input type="hidden" name="email" value="<?php echo $emailuser ?> " />

              <br/>
              <input type="submit" value="Enviar a tu email!" name="enviar"/>
            </form>

            <?php

        echo "O si rellenas este formulario, te la enviaremos a este correo electronico:";
        ?>
        		<form name = "formulario" method="GET" action='../controlador/pdfentradaemail.php'>

              TU E-MAIL: <input type="text" name="email" placeholder="tu email" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>"/>

            <!-- para pasar las variables con el formulario -->
               <input type="hidden" name="fila" value="<?php  echo ($fila + 1) ?> " />
              <input type="hidden" name="silla" value="<?php  echo ($silla + 1) ?> " />
              <input type="hidden" name="sala" value="<?php  echo $sala ?> " />
              <input type="hidden" name="dia" value="<?php  echo $dia ?> " />
              <input type="hidden" name="sesion" value="<?php  echo $sesion ?> " />
              <input type="hidden" name="pelicula" value="<?php  echo $pelicula ?> " />
              <input type="hidden" name="usuario" value="<?php echo $usuario ?> " />
              <br/>
              <input type="submit" value="ENVIAR!" name="enviar"/>
            </form>
            <?php


        echo "<a href='comprarEntrada.php?sesionActual=" . $sesion . "&peliculaActual=" . $pelicula ."&emailuser=". $emailuser . "&diaActual=" . $dia . "'><img src='../imagenes/comprar-mas.png'></a>";

        ?>
    </body>
</html>
