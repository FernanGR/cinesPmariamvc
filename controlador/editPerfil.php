
     <body>
          <?php
         //session_start();
            $usuario = $_SESSION['usuario'];

        $userAct = Users::userActual($usuario);
         ?>
         <h2> Editar Perfil de <?php echo $usuario; ?> </h2>
          <form method="POST" action='../controlador/actualizarPerfil.php'>
           <input type="hidden" name="user" value="<?php  echo $userAct[0][0] ?>"/>
             <?php
            echo "Nombre: ";
            echo "<td><input name=newUser value =" . $userAct[0][0] . "> </td><br/>" ;
            echo "Contraseña:";
            echo "<td ><input name=newPass value =" . $userAct[0][1] . "> </td><br/>" ;
            echo "Email:";
            echo "<td> <input name=newEmail value =" . $userAct[0][2] . "></td><br/>";
             ?>

              <input type="submit" value="Editar Perfil" name="editarPerfil"/>
          </form>

         <?php
         //echo " <a href='../index.php?user= $usuario&rol=ROL_USER'><button> Volver Menu </button></a>" ;
         ?>
     </body>
