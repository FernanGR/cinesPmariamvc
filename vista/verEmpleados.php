<?php
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
  //require_once '../modelo/userModel.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cines Empleados</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    </head>
    <body>
        <img src="imagenes/cines_pmaria.jpg"/>
        <?php
          session_start();
          $_GET['usuario'] = "";
          $_GET['contraseña'] = "";
          $_GET['email'] = "";

        ?>

        <h2> Añadir Nuevo Usuario </h2>
         <form method="GET" action= 'añadirEmp.php'>
             Usuario:<input type="text" name="usuario" value="<?php if(isset($_GET['usuario'])) echo $_GET['usuario']; ?>" />
             <?php if(isset($_GET['registrar']) && empty($_GET['usuario'])) echo "<span style='color:red'><--¡Debe introducir un nombre de usuario!</span>"; ?><br>
             Contraseña:<input type="password" name="contraseña" value="<?php if(isset($_GET['contraseña'])) echo $_GET['contraseña']; ?>" />
             <?php if(isset($_GET['registrar']) && empty($_GET['contraseña'])) echo "<span style='color:red'><--¡Debes introducir un password!</span>"; ?><br>
               Email:<input type="email" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>" />
               <?php if(isset($_GET['registrar']) && empty($_GET['email'])) echo "<span style='color:red'><--¡Debes introducir un email!</span>"; ?><br>
             <input type="submit" value="Registrar Empleado" name="registrar"/>
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
        //  $conexion = new mysqli('localhost','root','','cinespmaria');
          //$resultados = $conexion->query("SELECT * FROM usuarios WHERE ROL LIKE 'ROL_USER'");
      //   $resultados = Users::listaUsuarios();
         //while($resultado = $resultados->fetch_assoc()){

      //  foreach ($resultados as $fila):
          foreach (Users::listaEmpleados() as $resultado) {

            ?>
            <form name = "formulario" method="GET" action= 'actualizarEmp.php'>
            <input type="hidden" name="user" value="<?php  echo $resultado[0] ?> " />

            <?php
            echo "<td ><input name=newUser value =" . $resultado[0] . "> </td>" ;
            echo "<td> <input name=contrasena value =" . $resultado[1] . "></td>";
            echo "<td> <input name=email value =" . $resultado[2] . "></td>";
            echo "<td> <input name=roll value =" . $resultado[3] . "></td>";
            echo "<td> <input name=activo value =" . $resultado[4] . "></td>";
            echo "<td> <input name=horario value =" . $resultado[5] . "></td>";

            echo "<td>"
             ?>
          <input type="submit" value="Actualizar Usuario" name="editUser"/>

          </form>
            <form name = "formulario" method="GET" action= 'eliminarEmp.php'>
            <input type="hidden" name="user" value="<?php  echo $resultado[0] ?> " />
            <input type="submit" value="Eliminar Usuario" name="deleteUser"/>
          </form>
        <?php

        echo "</td></tr>";

     }
      echo "</table>";


  ?>


    </body>
</html>
