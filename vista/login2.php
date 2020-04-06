<?php
  require_once '../dao/peliculaDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/userDao.php';
?>

<?php ob_start();?>
<?php
        session_start();
        if(!empty($_POST['usuario']) && !empty($_POST['contraseña']))
        {
            $usuario = $_POST['usuario'];
            $pass =  $_POST['contraseña'];

            foreach (Users::loginUsuario($usuario,$pass) as $userLogin){

            if($userLogin != null)
            {
                $datosUser = Users::userActual($usuario);
                $_SESSION['usuario'] = $userLogin[0];
                $us = $datosUser[0][0];
                $rol = $datosUser[0][3];
                header("Location:../index.php");
            }
          }
        }

        if(isset($_SESSION['usuario']))
        {
          header("Location:../index.php");
        }
        else
        {
            if(isset($usuario))
            {
                header("Location:indexLogin.php");
                echo "<span style='color:red'>Datos incorrectos. Prueba de nuevo</span><br>";
            }
            else
            {
                header("Location:indexLogin.php");
                echo "<span style='color:blue'>Introduce tus credenciales para entrar</span><br>";
            }
        }
?>


<?php ob_end_flush(); ?>



<?php
/*
<main class="mt-3 mx-5 text-center">
  <form class="form-signin" method="POST" action= 'login2.php'>
     <h1 class="h3 mb-3 font-weight-normal">Acceso Usuario</h1>
    <label for="usuario" class="sr-only">Usuario</label>
    <input type="text" name="usuario" class="form-control" placeholder="Nombre usuario" required autofocus>
    <label for="contraseña" class="sr-only">Contraseña</label>
    <input type="password" name="contraseña"  class="form-control" placeholder="Contraseña" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

  </form>
  <p>¿Aún no te has registrado?<a href="<?php echo "indexRegistro.php"; ?>">¡Regístrate!</a></p>

</main>
*/
 ?>
