<?php
    require_once '../modelo/userModelo.php';
    require_once '../modelo/conexion.php';


       $usuario = $_POST['user'];
       Users::eliminarUser($usuario);
       header("Location:../vista/indexEditUsers.php");


 ?>
