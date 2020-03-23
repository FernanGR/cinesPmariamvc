<?php
require_once '../dao/userDao.php';
require_once '../modelo/conexion.php';


    session_start();

       $empleado = $_GET['user'];
       Users::eliminarUser($empleado);
       header("Location:verEmpleados.php");

 ?>
