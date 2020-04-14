
    <body>


        <h2> Añadir Nuevo Empleado </h2>
         <form autocomplete="off" method="POST" action= '../controlador/añadirEmp.php'>

            Usuario:<input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>" required/>
            <br/>
            Contraseña:<input type="password" name="contraseña" value="<?php if(isset($_POST['contraseña'])) echo $_POST['contraseña']; ?>" required/>
            <br/>
            Email:<input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required/>
            <br/>
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

          foreach (Users::listaEmpleados() as $empleados) {

            ?>
            <form name = "formulario" method="POST" action= '../controlador/actualizarEmp.php'>
            <input type="hidden" name="user" value="<?php  echo $empleados[0] ?> " />


            <?php
              echo "<td ><input name=newUser value =" . $empleados[0] . "> </td>" ;
              echo "<td> <input name=contrasena value =" . $empleados[1] . "></td>";
              echo "<td> <input name=email value =" . $empleados[2] . "></td>";
              echo "<td> <input name=roll value =" . $empleados[3] . "></td>";
              echo "<td> <input name=activo value =" . $empleados[4] . "></td>";
              echo "<td> <input name=horario value =" . $empleados[5] . "></td>";

              echo "<td>"
             ?>
          <input type="submit" value="Actualizar Empleado" name="editUser"/>

          </form>
            <form name = "formulario" method="POST" action= '../controlador/eliminarEmp.php'>
            <input type="hidden" name="user" value="<?php  echo $empleados[0] ?> " />

            <input type="submit" value="Eliminar Empleado" name="deleteEmp"/>
          </form>
        <?php

        echo "</td></tr>";

     }
      echo "</table>";


  ?>


    </body>
