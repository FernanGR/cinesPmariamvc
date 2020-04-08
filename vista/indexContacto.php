 <?php
  require_once '../dao/peliculaDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/userDao.php';
?>
<!doctype html>
<html lang="en">
  <head>
  <!--  <meta charset="utf-8">  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Web CinesPmaria">
    <meta name="author" content="FernandoGR">
    <link rel="icon" href="../favicon_io/favicon.ico">

    <title>Cines Pmaria</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">

   </head>

  <body>
    <?php
    session_start();
    if(isset($_SESSION['usuario']))
    //if(isset($_GET['user']))
      {
        //  header("Location:vista/login.php");

        $userLog = $_SESSION['usuario'];
        $rolUser = Users::userRol($_SESSION['usuario']);
        $rol = $rolUser[0][3];

      }
       ?>
    <!-- navbar -->
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand text-white" href="../index.php">
            <img src="../imagenes/cines_pmaria.jpg" height="50" width="50">
            Cines Pmaria
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="../index.php"><i class="fas fa-home pr-2"></i>Inicio</a>
              </li>

              <?php
                if(!isset($rol)){
              ?>
                  <li class="nav-item">
                    <a class="nav-link" href="indexCartelera.php"><i class="fas fa-video pr-2"></i>Cartelera</a>
                  </li>

              <?php
              }
              if(isset($rol)){
                if($rol == "ROL_ADMIN"){ // solo admins
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="indexEditUsers.php"><i class="fas fa-user-edit pr-2"></i>Editar Usuarios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="indexEditEmp.php"><i class="fas fa-user-edit pr-2"></i>Editar empleados</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="indexEditPeli.php"><i class="fas fa-film pr-2"></i>Editar Peliculas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="indexEditFotos.php"><i class="fas fa-image pr-2"></i>Editar Imagenes Cartelera</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="indexEditHorario.php"><i class="fas fa-user-clock pr-2"></i>Editar horarios</a>
                </li>

               <?php
                }
                if($rol == "ROL_EMP"){ // empleados y admin

                ?>
               <li class="nav-item">
                 <a class="nav-link" href="indexVerHor.php"><i class="fas fa-clock pr-2"></i>Ver horarios</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="indexComEmp.php"><i class="fas fa-sms pr-2"></i>Sugerencia de horarios</a>
               </li>
               <?php
                }
               if($rol == "ROL_USER" || $rol == "ROL_ADMIN" || $rol == "ROL_EMP"){ // user, empleado y admin
                ?>

                <li class="nav-item">
                  <a class="nav-link" href="indexEditPerfil.php"><i class="fas fa-user-edit pr-2"></i>Editar perfil</a>
                </li>

                <?php
              }
              if($rol == "ROL_USER"){  //user
                 ?>
                <li class="nav-item">
                     <a class="nav-link" href="../vista/indexComEntrada.php"><i class="fas fa-ticket-alt pr-2"></i>Comprar Entrada</a>
               </li>
                <?php
                }
              }

              if(!isset($rol)){

                ?>
                <li class="nav-item active">
                  <a class="nav-link" href="indexContacto.php"><i class="fas fa-search-location pr-2"></i>Contacto</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="indexLogin.php"><i class="fas fa-sign-in-alt pr-2"></i>Login</a>
                </li>
                <?php
                  }else{
                  ?>
               <li class="nav-item">
                   <a class="nav-link" href="../controlador/logout.php"><i class="fas fa-sign-out-alt pr-2"></i>Logout</a>
               </li>

         <?php
       }
       ?>
     </ul>
   </div>
 </nav>
</header>
<main class="mt-3 mx-5 container">

<!-- lado izquierda -->


  <!-- medio -->

  <div class="container">
    <h2 class="text-center"><b>Cines Pmaria</b></h2>

              <div class="row">
                <div  class="d-none d-md-block col-lg-10  ">
                 <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2206.384944277466!2d-0.12675881918604767!3d38.54991258133062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd620565a4b2d9e3%3A0x73de7f48c25463c6!2sVia%20Bus!5e0!3m2!1ses!2ses!4v1585965565841!5m2!1ses!2ses" width="1150" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
               </div>
                <div class=" text-center mt-3 d-none d-md-block col-lg-12">

                 <h3>En los Cines Pmaria podrás disfrutar de todas estas ventajas:</h3>

                    <span>  Parking gratuito </span><br/>
                    <span> Sonido digital DOLBY, SDDS y DTS.</span><br/>
                    <span>  Sistema de sonido para V.O.</span><br/>
                    <span>Sistema de proyección digital en 3D para una experiencia única. </span><br/>
                    <span>Reposabrazos dobles. </span><br/>
                    <span> Amplia separación entre filas. </span><br/>
                    <span> Descuentos Carnet Joven, mayores de 65 años y Carnet Universitario los martes y jueves, no festivos y vísperas. </span>
                    <br/><br/>
                    <h4> Día del espectador:</h4>
                <li> Lunes y Miércoles </li>
               </div>
              </div>

           <br/>

         </div>
         <div class="container my-5">
            <div class="row">
              <div class="d-none d-md-block col-lg-5 ">
                <h3><b>Localización</b></h3>
                <p>Estación de Autobuses de Benidorm
                  Paseo Els Tolls, S/N,
                  03502 Benidorm, Alicante </p>
                  <h3><b>Telefono</b></h3>
                  <p>96 664 43 23</p>
                  <h3><b>Email</b></h3>
                  <p>cinespmaria@gmail.com</p>
              </div>
              <div class="col-xs-12 col-lg-7">
                <h2><b>Contactenos</b></h2>
                <hr>
                <form role="form" id="Formulario" action="../controlador/contactaEmail.php" method="POST">
                    <div class="form-group">
                        <label class="control-label" for="Nombre">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Introduzca su nombre" required autofocus />
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="Correo">Dirección de Correo Electrónico</label>
                        <input type="email" class="form-control" id="Correo" name="Correo" placeholder="Introduzca su correo electrónico" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="Mensaje">Mensaje</label>
                        <textarea rows="5" cols="30" class="form-control" id="Mensaje" name="Mensaje" placeholder="Introduzca su mensaje" required ></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <input type="reset" class="btn btn-default" value="Limpiar">
                    </div>
                    <div id="respuesta" style="display: none;"></div>
                </form>
              </div>
            </div>

         </div>
  </section>

<!-- lado derecho -->


</section>


    </main><!-- /.container -->


<!-- Footer -->
<?php
  include("footer.php");
 ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
