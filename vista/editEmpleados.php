
    <body>


        <h2 class="text-success"><b> Añadir Nuevo Empleado </b></h2>
         <form autocomplete="off" method="POST" action= '../controlador/añadirEmp.php'>

            Usuario:<input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario']; ?>" required/>
            <br/>
            Contraseña:<input type="password" name="contraseña" value="<?php if(isset($_POST['contraseña'])) echo $_POST['contraseña']; ?>" required/>
            <br/>
            Email:<input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required/>
            <br/>
              <input type="submit" value="Registrar Empleado" name="registrar" class="btn-success mt-2"/>
         </form>


        <br/>
        <table style="border: 1px solid black;" width="95%">
          <tr>
            <th style="border: 1px solid black;" class="text-blue"><b>EMPLEADO</b></th>
            <th style="border: 1px solid black;" class="text-blue"><b>CONTRASEÑA</b></th>
            <th style="border: 1px solid black;" class="text-blue"><b>EMAIL</b></th>
            <th style="border: 1px solid black;" class="text-blue"><b>ROL</b></th>
            <th style="border: 1px solid black;" class="text-blue"><b>ACTIVO</b></th>
            <th style="border: 1px solid black;" class="text-blue"><b>HORARIO</b></th>
            <th style="border: 1px solid black;" class="text-blue"><b>ACCIÓN</b></th>

          </tr>

          <style>
            table, tr, th, td{
            border: 1px solid #2b351f;
            text-align: center;
            }
          </style>

          <?php

          foreach (Users::listaEmpleados() as $empleados) {

            ?>
            <form name = "formulario" method="POST" action= '../controlador/actualizarEmp.php'>
            <input type="hidden" name="user" value="<?php  echo $empleados[0] ?> " />


            <?php
              echo "<td ><input name=newUser value =" . $empleados[0] . " style='width : 100px;' > </td>" ;     // EMPLEADO
              echo "<td> <input name=contrasena value =" . $empleados[1] .  " style='width : 150px;' > </td>" ; //CONTRASEÑA
              echo "<td> <input name=email value =" . $empleados[2] .  " style='width : 180px;' > </td>" ;      //EMAIL
              echo "<td> <input name=roll value =" . $empleados[3] .  " style='width : 100px;' > </td>" ;       //ROL
              echo "<td> <input name=activo value =" . $empleados[4] .  " style='width : 100px;' > </td>" ;     //ACTIVO
              echo "<td> <input name=horario value =" . $empleados[5] . " style='width : 100px;' > </td>" ;     //HORARIO

              echo "<td>"
             ?>
          <input type="submit" value="Actualizar Empleado" name="editUser" class="btn-bClaro m-1 p-1"/>

          </form>
            <form name = "formulario" method="POST" action= '../controlador/eliminarEmp.php'>
            <input type="hidden" name="user" value="<?php  echo $empleados[0] ?> " />

            <input type="submit" value="Eliminar Empleado" name="deleteEmp" class="btn-rClaro m-1 p-1"/>
          </form>
        <?php

        echo "</td></tr>";

     }
      echo "</table>";


  ?>


    </body>
