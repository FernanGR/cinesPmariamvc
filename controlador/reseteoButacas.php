<?php
  require_once '../modelo/horarioModelo.php';
  require_once '../modelo/peliculaModelo.php';
  require_once '../modelo/userModelo.php';
  require_once '../modelo/conexion.php';

session_start();

  Peliculas::reseteoButacas();

     header("Location:../vista/indexEditHorario.php");


 ?>
