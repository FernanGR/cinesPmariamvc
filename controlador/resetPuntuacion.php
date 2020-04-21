<?php
  require_once '../Modelo/peliculaModelo.php';
  require_once '../modelo/conexion.php';
  require_once '../Modelo/userModelo.php';
  require_once '../Modelo/puntuacionModelo.php';


       $pelicula = $_POST['pelicula'];


        Puntuacion::resetPuntuacion($pelicula);
        header("Location:../vista/indexEditPeli.php");



 ?>
