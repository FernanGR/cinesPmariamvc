<?php

  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';

       $empleado = $_POST['usuario'];
       $contrasena = $_POST['contraseña'];
       $email = $_POST['email'];
       $rol = 'ROL_EMP';

       Users::añadirEmp($empleado, $contrasena,$email,$rol);

       header("Location:../vista/indexEditEmp.php");

 ?>
