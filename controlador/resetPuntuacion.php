<?php
  require_once '../modelo/peliculaModelo.php';
  require_once '../modelo/conexion.php';
  require_once '../modelo/userModelo.php';
  require_once '../modelo/puntuacionModelo.php';


       $pelicula = $_POST['pelicula'];


        Puntuacion::resetPuntuacion($pelicula);
        header("Location:../vista/indexEditPeli.php");



 ?>
