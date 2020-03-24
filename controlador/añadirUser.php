<?php

  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';


session_start();


       $usuario = $_GET['usuario'];
       $contrasena = $_GET['contraseña'];
       $email = $_GET['email'];
       $rol = 'ROL_USER';


       Users::añadirUsuario($usuario, $contrasena,$email,$rol);

     header("Location:../vista/verUsuarios.php");


 ?>
