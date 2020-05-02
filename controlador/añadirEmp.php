<?php
  require_once '../modelo/userModelo.php';
  require_once '../modelo/conexion.php';

       $empleado = $_POST['usuario'];
       $contrasena = $_POST['contraseña'];
       $email = $_POST['email'];
       $rol = 'ROL_EMP';

       $yaesta = 0;

       $lista = Users::listaTodos();
       foreach ($lista as $user) {
         if(strcasecmp($user[0], $empleado) == 0){
           echo'<script type="text/javascript">
                 alert("El nombre de usuario/empleado ya esta en uso. \nElige otro.");
                 window.location.href="../vista/indexEditEmp.php";
                 </script>';
                 $yaesta = 1;
           }
       }

       if($yaesta != 1){
         Users::añadirEmp($empleado, $contrasena,$email,$rol);
         header("Location:../vista/indexEditEmp.php");
       }
 ?>
