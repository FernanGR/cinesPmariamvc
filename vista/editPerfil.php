 
          <?php
         //session_start();
            $usuario = $_SESSION['usuario'];

        $userAct = Users::userActual($usuario);
         ?>
         <h2 class="text-success"><b> Editar Perfil de <?php echo $usuario; ?> </b></h2>
          <form method="POST" action='../controlador/actualizarPerfil.php'>
           <input type="hidden" name="user" value="<?php  echo $userAct[0][0] ?>"/>
             <?php
            echo "Nombre: ";
            echo "<td><input name=newUser value =" . $userAct[0][0] . " style='width : 160px;'> </td><br/>" ;
            echo "Contraseña: ";
            echo "<td ><input name=newPass value =" . $userAct[0][1] . " style='width : 140px;'> </td><br/>" ;
            echo "Email: ";
            echo "<td> <input name=newEmail value =" . $userAct[0][2] . " style='width : 180px;'></td><br/>";
             ?>
             <br/>
              <input type="submit" value="Editar Perfil" name="editarPerfil" class="btn-success"/>
          </form>
