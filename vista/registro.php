
    <body>
     <h1 class='text-success'>Registro de Usuario</h1>

        <form method="POST" action='../controlador/añadirLogin.php'>
            Usuario:<input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>" required/>
            <?php if(isset($_POST['registrar']) && empty($_POST['usuario'])) echo "<span style='color:red'><--¡Debe introducir un nombre de usuario!</span>"; ?><br>
            Contraseña:<input type="password" name="contraseña" value="<?php if(isset($_POST['contraseña'])) echo $_POST['contraseña']; ?>" required/>
            <?php if(isset($_POST['registrar']) && empty($_POST['contraseña'])) echo "<span style='color:red'><--¡Debes introducir un password!</span>"; ?><br>
              Email:<input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"  required/>
              <?php if(isset($_POST['registrar']) && empty($_POST['email'])) echo "<span style='color:red'><--¡Debes introducir un email!</span>"; ?><br>
            <input type="submit" value="Registrarme" name="registrar" class="btn-success"/>
        </form>
          <p>¿Ya estas registrado? Ve al <a href="<?php echo "indexLogin.php"; ?>">¡LOGIN!</a></p>
    </body>
