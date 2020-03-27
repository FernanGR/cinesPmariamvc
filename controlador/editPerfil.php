<?php
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/peliculaDao.php';
  require_once '../dao/horarioDao.php';

 ?>

 <!DOCTYPE html>
 <html>
     <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
       <meta charset="UTF-8"/>
         <title>Cines Empleados</title>
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
     </head>
     <body>
         <img src="../imagenes/cines_pmaria.jpg"/>
         <?php
         //session_start();
        // $usuario = $_SESSION['usuario'];
            $usuario = $_GET['usuario'];
        //   $conexion = new mysqli('localhost','root','','cinespmaria');
        //   $consulta = $conexion->query("SELECT * FROM usuarios where usuario = '"  . $usuario . "'");
        //   $resultado = $consulta->fetch_assoc();
        $userAct = Users::userActual($usuario);
         ?>
         <h2> Editar Perfil de <?php echo $usuario; ?> </h2>
          <form method="GET" action='actualizarPerfil.php'>
           <input type="hidden" name="user" value="<?php  echo $userAct[0][0] ?>"/>
            <?php
            echo "<td ><input name=newUser value =" . $userAct[0][0] . "> </td>" ;
            echo "<td ><input name=newPass value =" . $userAct[0][1] . "> </td>" ;
            echo "<td> <input name=newEmail value =" . $userAct[0][2] . "></td>";
             ?>

              <input type="submit" value="Editar Perfil" name="registrar"/>
          </form>

         <a href='../index.php?user=<?php echo $usuario ?>&rol=ROL_USER'><button>Volver al Menu</button></a>
        <?php
         //echo " <a href='../index.php?user= $usuario&rol=ROL_USER'><button> Volver Menu </button></a>" ;
         ?>
     </body>
 </html>
