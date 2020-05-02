<?php
  require_once '../modelo/userModelo.php';
  require_once '../modelo/conexion.php';
  require_once '../modelo/peliculaModelo.php';
  require_once '../modelo/horarioModelo.php';



       $usuario = $_POST['user'];
       $newUser = $_POST['newUser'];
       $contrasena = $_POST['newPass'];
       $email = $_POST['newEmail'];


       $yaesta = 0;

       $lista = Users::listaTodos();

     if(strcasecmp($usuario, $newUser) == 0){
       Users::actualizarPerfil($usuario,$newUser,$contrasena,$email);
        session_start();
        $_SESSION['usuario'] = $newUser;

        header("Location:../vista/indexEditPerfil.php");
     }else{
       foreach ($lista as $user) {
         if(strcasecmp($user[0], $newUser) == 0){
           echo'<script type="text/javascript">
                 alert("El nombre de usuario ya esta usado. \nElige otro!");
                 window.location.href="../vista/indexEditPerfil.php";
                 </script>';
                 $yaesta = 1;
           }

       }

      if($yaesta != 1){
        Users::actualizarPerfil($usuario,$newUser,$contrasena,$email);
         session_start();
          $_SESSION['usuario'] = $newUser;

           header("Location:../vista/indexEditPerfil.php");

     }
 }




 ?>
