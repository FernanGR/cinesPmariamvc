
        <?php
        //  session_start();

          //$admin = $_SESSION['usuario'];
        //  echo "<br/>Admin: " . $admin;

    //    $user = $_POST['user'];
      //  $rol = $_POST['rol'];
          $_POST['usuario'] = "";
          $_POST['contraseña'] = "";
          $_POST['email'] = "";
      //    echo $user;
      //    echo $rol;
        ?>

        <h2> Añadir Nuevo Usuario </h2>
         <form method="POST" action= '../controlador/añadirUser.php'>
           <input type="hidden" name=user value="<?php echo $user ?>" />
           <input type="hidden" name=rol value="<?php echo $rol ?>" />
             Usuario:<input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>" />
             <?php if(isset($_POST['registrar']) && empty($_POST['usuario'])) echo "<span style='color:red'><--¡Debe introducir un nombre de usuario!</span>"; ?><br>
             Contraseña:<input type="password" name="contraseña" value="<?php if(isset($_POST['contraseña'])) echo $_POST['contraseña']; ?>" />
             <?php if(isset($_POST['registrar']) && empty($_POST['contraseña'])) echo "<span style='color:red'><--¡Debes introducir un password!</span>"; ?><br>
               Email:<input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
               <?php if(isset($_POST['registrar']) && empty($_POST['email'])) echo "<span style='color:red'><--¡Debes introducir un email!</span>"; ?><br>
             <input type="submit" value="Registrar Usuario" name="registrar"/>
         </form>

        <br/>
        <table style="border: 1px solid black;" width="95%">
          <tr>
            <th style="border: 1px solid black;"><b>USUARIO</b></th>
            <th style="border: 1px solid black;"><b>CONTRASEÑA</b></th>
            <th style="border: 1px solid black;"><b>EMAIL</b></th>
            <th style="border: 1px solid black;"><b>ROL</b></th>
            <th style="border: 1px solid black;"><b>ACTIVO</b></th>
            <th style="border: 1px solid black;"><b>HORARIO</b></th>

          </tr>

          <style>
          table, tr, th, td{
          border: 1px solid #000000;
          text-align: center;
              }
          </style>

          <?php

          foreach (Users::listaUsuarios() as $listauser) {

            ?>
            <form name = "formulario" method="POST" action= '../controlador/actualizarUser.php'>
            <input type="hidden" name="oldUser" value="<?php  echo $listauser[0] ?> " />

            <?php
            echo "<td ><input name=newUser value =" . $listauser[0] . "> </td>" ;
            echo "<td> <input name=contrasena value =" . $listauser[1] . "></td>";
            echo "<td> <input name=email value =" . $listauser[2] . "></td>";
            echo "<td> <input name=roll value =" . $listauser[3] . "></td>";
            echo "<td> <input name=activo value =" . $listauser[4] . "></td>";
            echo "<td> <input name=horario value =" . $listauser[5] . "></td>";

            echo "<td>"
             ?>
          <input type="submit" value="Actualizar Usuario" name="editUser"/>

          </form>
            <form name = "formulario" method="POST" action= '../controlador/eliminarUser.php'>
            <input type="hidden" name="user" value="<?php  echo $listauser[0] ?> " />
   
            <input type="submit" value="Eliminar Usuario" name="deleteUser"/>
          </form>
        <?php

        echo "</td></tr>";

     }
      echo "</table>";


  ?>
