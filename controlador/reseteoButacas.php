<?php


  require_once '../Modelo/horarioModelo.php';
  require_once '../Modelo/peliculaModelo.php';
  require_once '../Modelo/userModelo.php';
  require_once '../modelo/conexion.php';

session_start();

  Peliculas::reseteoButacas();

     header("Location:../vista/indexEditHorario.php");


 ?>
