<?php

  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';


session_start();


       $usuario = $_GET['user'];
       $newUser = $_GET['newUser'];
       $contrasena = $_GET['contrasena'];
       $email = $_GET['email'];
       $activo = $_GET['activo'];
       $rol = $_GET['roll'];
       $horario = $_GET['horario'];

       Users::actualizarUser($usuario,$newUser,$contrasena,$email,$activo,$rol,$horario);

     header("Location:../vista/verUsuarios.php");


 ?>
