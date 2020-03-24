<?php
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
  //require_once '../modelo/userModel.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cines PMaria Register</title>
    </head>
    <body>
        <img src="imagenes/cines_pmaria.jpg"/>
        <h1>Registrarme</h1>
        <?php
/*
        if(!empty($_GET['usuario']) && !empty($_GET['contraseña'] && !empty($_GET['email'])))
        {
          //  $conexion = new mysqli('localhost','root','','cinespmaria');
						$user = $_GET['usuario'];
					//	$pass =sha1($_GET['contraseña']);
            $pass =$_GET['contraseña'];
            $email = $_GET['email'];
            $rol = 'ROL_USER';

            Users::añadirUsuario($user, $pass,$email,$rol);
					//  $sql = "INSERT INTO usuarios (usuario,contrasena,email) VALUES ('$user' , '$pass', '$email')";
          //  $consulta = $conexion->query($sql);

            $_GET['usuario'] = "";
            $_GET['contraseña'] = "";
            $_GET['email'] = "";

            header("Location:login.php");
        }
*/
//  <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; >">
        ?>

        <form method="GET" action='../controlador/añadirLogin.php'>
            Usuario:<input type="text" name="usuario" value="<?php if(isset($_GET['usuario'])) echo $_GET['usuario']; ?>" />
            <?php if(isset($_GET['registrar']) && empty($_GET['usuario'])) echo "<span style='color:red'><--¡Debe introducir un nombre de usuario!</span>"; ?><br>
            Contraseña:<input type="password" name="contraseña" value="<?php if(isset($_GET['contraseña'])) echo $_GET['contraseña']; ?>" />
            <?php if(isset($_GET['registrar']) && empty($_GET['contraseña'])) echo "<span style='color:red'><--¡Debes introducir un password!</span>"; ?><br>
              Email:<input type="email" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>" />
              <?php if(isset($_GET['registrar']) && empty($_GET['email'])) echo "<span style='color:red'><--¡Debes introducir un email!</span>"; ?><br>
            <input type="submit" value="Registrarme" name="registrar"/>
        </form>
          <p>¿Ya estas registrado? Ve al <a href="<?php echo "login.php"; ?>">¡LOGIN!</a></p>
    </body>
</html>
