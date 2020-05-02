<?php

  require_once '../modelo/userModelo.php';
  require_once '../modelo/conexion.php';

       $empleado = $_POST['user'];
       $newEmp = $_POST['newUser'];
       $contrasena = $_POST['contrasena'];
       $email = $_POST['email'];
       $activo = $_POST['activo'];
       $rol = $_POST['roll'];
       $horario = $_POST['horario'];

       Users::actualizarUser($empleado,$newEmp,$contrasena,$email,$activo,$rol,$horario);

      header("Location:../vista/indexEditEmp.php");


 ?>
