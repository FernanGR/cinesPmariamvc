
        <?php

          $_POST['usuario'] = "";
          $_POST['contraseña'] = "";
          $_POST['email'] = "";

        ?>

        <div class="row">
          <div class= "col-sm-12 col-md-6">
        <h2 class="text-success"><b> Añadir Nuevo Usuario </b></h2>
         <form  autocomplete="off" method="POST" action= '../controlador/añadirUser.php'>
           <input type="hidden" name=user value="<?php echo $user ?>" />
           <input type="hidden" name=rol value="<?php echo $rol ?>" />
             Usuario:<input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'];  ?>" required />
             <?php if(isset($_POST['registrar']) && empty($_POST['usuario'])) echo "<span style='color:red'><--¡Debe introducir un nombre de usuario!</span>"; ?><br>
             Contraseña:<input type="password" name="contraseña" value="<?php if(isset($_POST['contraseña'])) echo $_POST['contraseña']; ?>" required/>
             <?php if(isset($_POST['registrar']) && empty($_POST['contraseña'])) echo "<span style='color:red'><--¡Debes introducir un password!</span>"; ?><br>
               Email:<input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required /><br>
               <?php if(isset($_POST['registrar']) && empty($_POST['email'])) echo "<span style='color:red'><--¡Debes introducir un email!</span>"; ?>
             <input type="submit" value="Registrar Usuario" name="registrar" class="btn-success mt-2 px-1"/>
         </form>
         <br/>

       </div>
       <div class= "col-sm-12 col-md-6">

         <h2 class="text-success"><b> Mensaje a los usuarios</b></h2>

           <form name = "formulario" method="POST" action= '../controlador/alertEmails.php'>

             <p><textarea name="comentario" placeholder="Envia mensaje publicitario a todos los usuarios" rows="4" cols="50" required></textarea></p>
             <input type="submit" value="Enviar mensaje" class="btn-success">
           </form>

        <br/>
      </div>
      </div>

        <!--    <table style="border: 1px solid black;" width="95%">    -->
          <table class="table table-bordered table-hover table-sm text-center">
          <thead>
            <tr class='text-dark table-dark'>
              <th style="border: 1px solid black;" class="text-blue"><b>NOMBRE</b></th>
              <th style="border: 1px solid black;" class="text-blue"><b>CONTRASEÑA</b></th>
              <th style="border: 1px solid black;" class="text-blue"><b>EMAIL</b></th>
              <th style="border: 1px solid black;" class="text-blue"><b>ROL</b></th>
              <th style="border: 1px solid black;" class="text-blue"><b>ACCIÓN</b></th>
           </tr>
         </thead>

<!--
          <style>
          table, tr, th, td{
          border: 1px solid #2b351f;
          text-align: center;
          padding-left: 2px;
          padding-right: 2px;
              }
          </style>
-->
          <?php

          foreach (Users::listaUsuarios() as $listauser) {

            ?>
            <form name = "formulario" method="POST" action= '../controlador/actualizarUser.php'>

            <input type="hidden" name="oldUser" value="<?php  echo $listauser[0] ?> " />    <!-- nombre actual usuario -->

            <?php
            echo "<tr>";
             echo "<td ><input name=newUser value =" . $listauser[0] . " style='width : 150px;'  class='w-100 text-center'> </td>" ;   // nuevo nombre del usuario
            echo "<td> <input name=contrasena value =" . $listauser[1] .  " style='width : 150px;'  class='w-100 text-center'> </td>" ;     //nueva contraseña


            echo "<td> <input name=email value =" . $listauser[2] . "  class=' text-center'></td>";         //nuevo email
            echo "<td> <input name=roll value =" . $listauser[3] .  "  style='width : 100px;'   class='text-center'> </td>" ;          //nuevo roll

            echo "<td>";
             ?>
          <input type="submit" value="Actualizar Usuario" name="editUser"  class="btn-bClaro m-1 p-1"/>

          </form>
            <form name = "formulario" method="POST" action= '../controlador/eliminarUser.php'>
            <input type="hidden" name="user" value="<?php  echo $listauser[0] ?> " />

          <input type="submit" value="Eliminar Usuario" name="deleteUser" class=" fas btn-rClaro m-1 p-1">
          </form>
        <?php

        echo "</td></tr>";
        echo "</div>";
     }
      echo "</table>";

  ?>
