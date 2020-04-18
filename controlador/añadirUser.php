<?php

  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';


       $usuario = $_POST['usuario'];
       $contrasena = $_POST['contraseña'];
       $email = $_POST['email'];
       $rol = 'ROL_USER';

       $yaesta = 0;

       $lista = Users::listaUsuarios();
       foreach ($lista as $user) {
         if($user[0] == $usuario){
           echo'<script type="text/javascript">
                 alert("El nombre de usuario ya esta, elige otro.");
                 window.location.href="../vista/indexEditUsers.php";
                 </script>';
                 $yaesta = 1;
           }
       }
      if($yaesta != 1){
       Users::añadirUsuario($usuario, $contrasena,$email,$rol);

       header("Location:../vista/indexEditUsers.php");
     }

 ?>
