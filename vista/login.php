
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
       echo " <h1>Acceso Usuario</h1>";

        if(isset($_SESSION['usuario']))
        {
          header("Location:../index.php");

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
          }
            ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <label for="usuario">Usuario</label>
                <input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>" required />
                <?php if(isset($_POST['entrar']) && empty($_POST['usuario'])) echo "<br/><span style='color:red'>¡Debes introducir tu nombre de usuario!</span>"; ?><br>

                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" value="<?php if(isset($_POST['contraseña'])) echo $_POST['contraseña']; ?>" required />
                <?php if(isset($_POST['entrar']) && empty($_POST['contraseña'])) echo "<br/><span style='color:red'>¡Debes introducir tu contraseña!</span>"; ?><br>
                <input type="submit" value="Entrar" name="entrar"/><br>
            </form>
            <p>¿Aún no te has registrado?<a href="<?php echo "indexRegistro.php"; ?>">¡Regístrate!</a></p>

<?php ob_end_flush(); ?>
