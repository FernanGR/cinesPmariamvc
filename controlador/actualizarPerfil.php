<?php
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/peliculaDao.php';
  require_once '../dao/horarioDao.php';



       $usuario = $_POST['user'];
       $newUser = $_POST['newUser'];
       $contrasena = $_POST['newPass'];
       $email = $_POST['newEmail'];

       Users::actualizarPerfil($usuario,$newUser,$contrasena,$email);
        session_start();
         $_SESSION['usuario'] = $newUser;

          header("Location:../vista/indexEditPerfil.php");

 ?>
