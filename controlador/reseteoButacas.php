<?php


  require_once '../dao/horarioDao.php';
  require_once '../dao/peliculaDao.php';
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';

session_start();
 
  Peliculas::reseteoButacas();

     header("Location:../vista/indexEditHorario.php");


 ?>
