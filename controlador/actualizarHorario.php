<?php

      require_once '../Modelo/horarioModelo.php';


       $empleado = $_POST['emp'];
       $lunes = $_POST['slunes'];
       $martes = $_POST['smartes'];
       $miercoles = $_POST['smiercoles'];
       $jueves = $_POST['sjueves'];
       $viernes = $_POST['sviernes'];
       $sabado = $_POST['ssabado'];
       $domingo = $_POST['sdomingo'];


       Horario::actualizarHorario($empleado,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo);

//      header("Location:editarHorario.php");
      header("Location:../vista/indexEditHorario.php");

 ?>
