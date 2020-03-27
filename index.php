<?php/*
  require_once 'dao/userDao.php';
  require_once 'modelo/conexion.php';
  require_once 'dao/peliculaDao.php';
  require_once 'dao/horarioDao.php';
*/
 ?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <title> Cines PMaria </title>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 </head>
<body>

<h1> Menu principal<h1>
  <br>
  <?php

  session_start();
  if(!isset($_SESSION['usuario']))
  {
      header("Location:vista/login.php");
  }
  //  $userLog = $_SESSION['usuario'];
    $rol = $_GET['rol'];
    $user = $_GET['user'];
    echo "Usuario: " . $user;
    echo "<br/>Rol: " . $rol;
   ?>

  <ul>

     <?php
     if($rol == "ROL_ADMIN"){ // solo admins
      ?>
    <li><a href="vista/verUsuarios.php?admin=<?php echo $user ?>">Ver usuarios</a></li>
    <li><a href="vista/verEmpleados.php">Ver empleados</a></li>
    <li><a href="vista/verPeliculas.php">Ver peliculas</a></li>
    <li><a href="controlador/editarHorario.php">Editar horarios (admin)</a></li>
    <li><a href="controlador/editarFotos.php?admin=<?php echo $user ?>">Editar foto de peliculas (admin)</a></li>
    <?php
  }
  if($rol == "ROL_EMP" || $rol == "ROL_ADMIN"){ // empleados y admin

     ?>
    <li><a href="vista/verHorario.php?usuario=<?php echo $user ?>">Ver Horarios (empleados)</a></li>
    <li><a href="vista/comentarEmpleado.php?usuario=<?php echo $user ?>">Comentario al Admin</a></li>

<?php
   }
   if($rol == "ROL_USER" || $rol == "ROL_ADMIN"){ // user y admin
 ?>
    <li><a href='vista/comprarEntrada.php?usuario=<?php echo $user ?>'>Comprar entrada</a></li>
     <li><a href="controlador/editPerfil.php?usuario=<?php echo $user ?>">Editar Perfil</a></li>

    <?php
  /*

    echo " <a href='../controlador/editPerfil.php?usuario=". $usuario ."'><button> Editar Perfil </button></a>" ;
   echo "<br>";*/
    ?>

<?php
}
 ?>
  <!--  <li><a href="vista/login.php">login</a></li>   -->
    <li><a href='controlador/logout.php'>logout </a></li>
  </ul>


</body>
</html>
