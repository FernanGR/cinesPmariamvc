<?php

  require_once '../Modelo/userModelo.php';
  require_once '../modelo/conexion.php';


session_start();


       $usuario = $_POST['usuario'];
       $contrasena = $_POST['contraseña'];
       $email = $_POST['email'];
       $rol = 'ROL_USER';

       $yaesta = 0;

       $lista = Users::listaTodos();
       foreach ($lista as $user) {
         if(strcasecmp($user[0], $usuario) == 0){
           echo'<script type="text/javascript">
                 alert("El nombre de usuario ya esta usado. \nElige otro!");
                 window.location.href="../vista/indexRegistro.php";
                 </script>';
                 $yaesta = 1;
           }
       }
      if($yaesta != 1){
       Users::añadirUsuario($usuario, $contrasena,$email,$rol);
       header("Location:../vista/indexLogin.php");
     }




 ?>
