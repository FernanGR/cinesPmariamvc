<?php

  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';


       $usuario = $_POST['usuario'];
       $contrasena = $_POST['contraseña'];
       $email = $_POST['email'];
       $rol = 'ROL_USER';


       Users::añadirUsuario($usuario, $contrasena,$email,$rol);

     header("Location:../vista/indexEditUsers.php");


 ?>
