<?php

  require_once '../dao/horarioDao.php';
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
 
session_start();


       $empleado = $_GET['emp'];
       $lunes = $_GET['slunes'];
       $martes = $_GET['smartes'];
       $miercoles = $_GET['smiercoles'];
       $jueves = $_GET['sjueves'];
       $viernes = $_GET['sviernes'];
       $sabado = $_GET['ssabado'];
       $domingo = $_GET['sdomingo'];


       Horario::actualizarHorario($empleado,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo);

      header("Location:editarHorario.php");


 ?>
