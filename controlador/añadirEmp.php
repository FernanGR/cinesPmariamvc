<?php

  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';


session_start();


       $empleado = $_GET['usuario'];
       $contrasena = $_GET['contraseña'];
       $email = $_GET['email'];
       $rol = 'ROL_EMP';


       Users::añadirEmp($empleado, $contrasena,$email,$rol);

     header("Location:../vista/verEmpleados.php");


 ?>
