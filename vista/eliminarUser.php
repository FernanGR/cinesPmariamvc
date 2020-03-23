<?php
require_once '../dao/userDao.php';
require_once '../modelo/conexion.php';


session_start();


       $usuario = $_GET['user'];

       Users::eliminarUser($usuario);


       header("Location:verUsuarios.php");


 ?>
