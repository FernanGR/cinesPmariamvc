<?php
   require_once '../modelo/userModelo.php';
   require_once '../modelo/conexion.php';

   $empleado = $_POST['user'];
   Users::eliminarEmp($empleado);
   header("Location:../vista/indexEditEmp.php");

 ?>
