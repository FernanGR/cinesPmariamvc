<?php
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/peliculaDao.php';
  require_once '../dao/horarioDao.php';


session_start();


       $usuario = $_GET['user'];
       $newUser = $_GET['newUser'];
       $contrasena = $_GET['newPass'];
       $email = $_GET['newEmail'];

       Users::actualizarPerfil($usuario,$newUser,$contrasena,$email);

         //$conexion = new mysqli('localhost','root','','cinespmaria');

         //$sql = ("UPDATE usuarios SET usuario='$newUser', contrasena= '$contrasena', email= '$email' WHERE usuario = '$usuario '");
      //  $conexion->query($sql);

        header("Location:logout.php");


 ?>
