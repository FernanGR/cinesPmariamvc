<?php
  require_once '../modelo/peliculaModelo.php';
  require_once '../modelo/conexion.php';
  require_once '../modelo/userModelo.php';
  require_once '../modelo/puntuacionModelo.php';


       $usuario = $_POST['usuario'];
       $pelicula = $_POST['pelicula'];
       $puntuacion = $_POST['puntuacion'];

       $yaEstaba = 0;
       $puntPeli = Puntuacion::puntuacionPeli($pelicula);

       foreach($puntPeli as $punt){
         if(strcasecmp($usuario, $punt[0]) == 0){
           Puntuacion::actualizarPuntuacion($usuario,$pelicula,$puntuacion);
           $yaEstaba = 1;
           header("Location:../vista/indexCartelera.php");
         }

      }
      if($yaEstaba != 1){
        Puntuacion::insertaPuntuacion($usuario,$pelicula,$puntuacion);
        header("Location:../vista/indexCartelera.php");

      }



 ?>
