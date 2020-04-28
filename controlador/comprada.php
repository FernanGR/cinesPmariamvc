<?php
  require_once '../Modelo/userModelo.php';
  require_once '../modelo/conexion.php';
  require_once '../Modelo/peliculaModelo.php';
  require_once '../Modelo/horarioModelo.php';

 ?>

 <!DOCTYPE html>
<html>
    <head>
        <title>cine Compra</title>
    </head>
    <body>

        <?php

        $fila = (int)$_POST['fila'];
        $silla = (int)$_POST['silla'];
        $sesion = $_POST['sesion'];
        $pelicula = $_POST['pelicula'];
        $sala = (int) $_POST['sala'];
        $usuario = $_POST['usuario'];
        $dia = $_POST['dia'];
      //  $modal = $_POST['modal'];

?>

<?php
/*
  if($modal == 1){

    ?>


    <!-- Modal -->
      <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h3 class="modal-title text-danger" id="staticBackdropLabel">Pago con tarjeta</h3>

         </div>
         <div class="modal-body">
           <!-- formulario modal -->
         <form role="formx"  action="indexComprada.php"  method="GET" class="credit-card-div">
           <div class="panel panel-default" >
            <div class="panel-heading">
              <div>
                <input type="hidden" name="fila" value="<?php  echo $fila ?>" />
                <input type="hidden" name="sala" value="<?php  echo $sala ?>" />
                <input type="hidden" name="emailuser" value="<?php  echo $_GET['emailuser'] ?>" />
                <input type="hidden" name="silla" value="<?php  echo $silla ?>" />
                <input type="hidden" name="dia" value="<?php  echo $dia ?>" />
                <input type="hidden" name="sesion" value="<?php  echo $sesion ?>" />
                <input type="hidden" name="pelicula" value="<?php  echo $pelicula ?>" />
                <input type="hidden" name="usuario" value="<?php  echo $usuario ?>" />
                <input type="hidden" name="modal" value="0" />
              </div>
              <div class="row ">
                      <div class="col-md-12">
                          <input type="text" class="form-control" placeholder="Introduce número tarjeta" pattern="[0-9]{13,18}" maxlength="18" required />
                      </div>
             </div>
             <div class="row ">
                      <div class="col-md-3 col-sm-3 col-xs-3">
                          <span class="help-block text-muted small-font" > Mes cad.</span>
                          <input type="text" class="form-control" placeholder="MM" pattern="[0-2]{2}" maxlength="2" required/>
                      </div>
                 <div class="col-md-3 col-sm-3 col-xs-3">
                          <span class="help-block text-muted small-font" >  Año cad.</span>
                          <input type="text" class="form-control" placeholder="YY" pattern="[0-9]{2}" maxlength="2" required/>
                      </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                       <span class="help-block text-muted small-font" >  CCV</span>
                       <input type="text" class="form-control" placeholder="CCV"  pattern="[0-9]{3}" maxlength="3" required/>
                </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <img src="../imagenes/tarjeta.jpg" class="img-rounded mt-2" />
                    </div>
                     </div>

                <div class="row">
           <div class="col-md-12 pad-adjust">
               <div class="checkbox">
               <label>
                 <input type="checkbox" checked class="text-muted"> Guardar datos de tarjeta
               </label>
             </div>
           </div>
                </div>
                  <div class="row ">
                       <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                         <button type="submit" class="btn btn-danger"
                         onclick= "self.location.href ='../vista/indexComEntrada.php?sesionActual=<?php echo $sesion ?>&peliculaActual=<?php echo $pelicula ?>&diaActual=<?php echo $dia ?>'" />
                          CANCELAR</button>

                         </div>
                         <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                             <input type="submit"  class="btn btn-warning btn-block" value="PAY NOW" />
                         </div>
                     </div>

             </div>
     </form>


           <!-- formulario modal -->
    <?php

  }else{

*/

    // capturo email del usuario actual
        foreach(Users::userActual($usuario) as $userA){
          $emailuser = $userA[2];

        }
      //  $emailuser = $_GET['emailuser'];

        if($sala == 1 || $sala == 2){
          $sillaElegida = ($fila * 20) + $silla;
        }else{
          $sillaElegida = ($fila * 10) + $silla;
        }

       $peli = Peliculas::dispoPeliculas($pelicula,$sesion,$dia);
        $disponibilidad = $peli[0][3];
        for($i = 0; $i < strlen($disponibilidad); $i++)
        {
          if($i == $sillaElegida)
            {
              ?>
              <script>
                console.log(<?php $sillaElegida ?>);
                </script>
              <?php
                $disponibilidad[$i] = 0;
            }
        }

       Peliculas::actualizaButacas($disponibilidad,$pelicula,$sesion,$dia);

        echo "<h1 class='text-primary'>¡Enhorabuena!</h1><br>";
        echo "<span class='text-dark'>Has adquirido una entrada. Para descargarla, pulsa aqui:</span>";
          ?>
          <form name = "formVuelta" method="POST" action='../controlador/pdfentrada.php'>

          <!-- para pasar las variables con el formulario -->
            <input type="hidden" name="fila" value="<?php  echo ($fila + 1) ?> " />
            <input type="hidden" name="silla" value="<?php  echo ($silla + 1) ?> " />
            <input type="hidden" name="sala" value="<?php  echo $sala ?> " />
            <input type="hidden" name="dia" value="<?php  echo $dia ?> " />
            <input type="hidden" name="sesion" value="<?php  echo $sesion ?> " />
            <input type="hidden" name="pelicula" value="<?php  echo $pelicula ?> " />
            <input type="hidden" name="usuario" value="<?php echo $usuario ?> " />
             <br/>
            <input type="submit" value="Descargar Entrada" name="enviar" class="btn-bClaro px-1"/>
          </form>

          <?php


      //  </span><a href='../controlador/pdfentrada.php?fila=" . ($fila + 1) . "&sala=" . $sala . "&pelicula=" .
  //      $pelicula . "&dia=" . $dia.  "&silla=" . ($silla + 1) . "&sesion=" . $sesion . "&usuario=" . $usuario . "'>AQUÍ</a><br>";


        echo "<hr/>";
        echo "<span class='text-dark'>Pulsa aqui para recibir la entrada en tu email: </span>";
         ?>
            <form name = "formulario" method="POST" action='../vista/indexComprarMas.php'>


            <!-- para pasar las variables con el formulario -->

              <input type="hidden" name="fila" value="<?php echo ($fila + 1) ?>" />
              <input type="hidden" name="silla" value="<?php echo ($silla + 1) ?>" />
              <input type="hidden" name="sala" value="<?php echo $sala ?>" />
              <input type="hidden" name="dia" value="<?php echo $dia ?>" />
              <input type="hidden" name="sesion" value="<?php echo $sesion ?>" />
              <input type="hidden" name="pelicula" value="<?php echo $pelicula ?>" />
              <input type="hidden" name="usuario" value="<?php echo $usuario ?>" />
              <input type="hidden" name="email" value="<?php echo $emailuser ?>" />

               <input type="submit" value="Enviar a tu email!" name="enviar" class="btn-bClaro px-1"/>
            </form>
             <?php

        echo "<hr/>";
        echo "O si rellenas este formulario, te la enviaremos a este correo electronico:";
        ?>
        		<form name = "formulario" method="POST" action='../vista/indexComprarMas.php'>

              TU E-MAIL: <input type="text" name="email" placeholder="tu email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required/>

            <!-- para pasar las variables con el formulario -->
              <input type="hidden" name="fila" value="<?php  echo ($fila + 1) ?>" />
              <input type="hidden" name="silla" value="<?php echo ($silla + 1) ?>" />
              <input type="hidden" name="sala" value="<?php echo $sala ?>" />
              <input type="hidden" name="dia" value="<?php echo $dia ?>" />
              <input type="hidden" name="sesion" value="<?php echo $sesion ?>" />
              <input type="hidden" name="pelicula" value="<?php echo $pelicula ?>" />
              <input type="hidden" name="usuario" value="<?php echo $usuario ?>" />
              <br/>
              <input type="submit" value="ENVIAR!" name="enviar" class="btn-bClaro px-1"/>
            </form>
            <?php

              // para comprar mas entradas (volver  salas)
              ?>
              <form name = "formVuelta" method="POST" action='../vista/indexComEntrada.php'>

              <!-- para pasar las variables con el formulario -->
                <input type="hidden" name="sesionActual" value="<?php  echo $sesion ?>" />
                <input type="hidden" name="peliculaActual" value="<?php  echo $pelicula ?>" />
                <input type="hidden" name="emailuser" value="<?php  echo $emailuser ?>" />
                <input type="hidden" name="diaActual" value="<?php  echo $dia ?>" />
                <input type="hidden" name="usuario" value="<?php echo $usuario ?>" />
                <br/>
                <input type="submit" value="COMPRAR MÁS ENTRADAS!" name="enviar" class="btn-success my-2 p-1"/>
              </form>


            <?php

//        echo "<a href='../vista/indexComEntrada.php?usuario=" . $usuario . "&sesionActual=" . $sesion . "&peliculaActual=" . $pelicula ."&emailuser=". $emailuser . "&diaActual=" . $dia . "'><button class='btn-rClaro my-3'>COMPRAR MÁS ENTRADAS</button></a>";
//  }
        ?>
    </body>
</html>
