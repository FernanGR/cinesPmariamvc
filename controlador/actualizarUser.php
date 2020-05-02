<?php
  require_once '../modelo/userModelo.php';
  require_once '../modelo/conexion.php';


       $usuario = $_POST['oldUser'];
       $newUser = $_POST['newUser'];
       $contrasena = $_POST['contrasena'];
       $email = $_POST['email'];
       $activo = $_POST['activo'];
       $rol = $_POST['roll'];
       $horario = $_POST['horario'];

       Users::actualizarUser($usuario,$newUser,$contrasena,$email,$activo,$rol,$horario);

       header("Location:../vista/indexEditUsers.php");


 ?>
