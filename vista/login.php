<?php

  require_once '../dao/horarioDao.php';
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cines Login</title>
    </head>
    <body>
        <img src="../imagenes/cines_pmaria.jpg"/>
        <?php

        session_start();

        if(!empty($_POST['usuario']) && !empty($_POST['contraseña']))
        {
            $usuario = $_POST['usuario'];
            $pass =  $_POST['contraseña'];
          //  $conexion = new mysqli('localhost','root','','cinespmaria');
          //  $sql = "SELECT * from usuarios WHERE usuario = '$usuario' AND contrasena = '$pass'";
        //  	$consulta = $conexion->query($sql);
        //   	$resultado = $consulta->fetch_assoc();

            foreach (Users::loginUsuario($usuario,$pass) as $userLogin){

            if($userLogin != null)
            {
                $datosUser = Users::userActual($usuario);
                $_SESSION['usuario'] = $userLogin[0];
                $us = $datosUser[0][0];
                $rol = $datosUser[0][3];
                header("Location:../index.php?user=" .$us. "&rol=" .$rol);
            }
          }
        }



       echo " <h1>LOGIN</h1>";

        if(isset($_SESSION['login']))
        {
            $datosUser = Users::userActual($_SESSION['usuario']);
            $us = $datosUser[0][0];
            $rol = $datosUser[0][3];
            header("Location:../index.php?user=" .$us. "&rol=" .$rol);

          //  header("Location:../index.php?user='" . $datosUser[0] . "&rol= '" . $datosUser[3]. "'");
        }
        else
        {
            if(isset($usuario))
            {
                echo "<span style='color:red'>Datos incorrectos. Prueba de nuevo</span><br>";

            }
            else
            {
                echo "<span style='color:blue'>Introduce tus credenciales para entrar</span><br>";
            }
        ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Usuario:<input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>" />
                <?php if(isset($_POST['entrar']) && empty($_POST['usuario'])) echo "<span style='color:red'><--¡Debe introducir tu nombre de usuario!</span>"; ?><br>
                Contraseña:<input type="password" name="contraseña" value="<?php if(isset($_POST['contraseña'])) echo $_POST['contraseña']; ?>" />
                <?php if(isset($_POST['entrar']) && empty($_POST['contraseña'])) echo "<span style='color:red'><--¡Debes introducir tu password!</span>"; ?><br>
                <input type="submit" value="Entrar" name="entrar"/><br>
            </form>
            <p>¿Aún no te has registrado?<a href="<?php echo "registro.php"; ?>">¡Regístrate!</a></p>
        <?php
        }
        ?>

    </body>
</html>
