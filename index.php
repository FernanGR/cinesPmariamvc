<?php
  require_once 'dao/peliculaDao.php';
  require_once 'modelo/conexion.php';
  require_once 'dao/userDao.php';
  require_once 'dao/imagenesDao.php';

  ?>

<!doctype html>
<html lang="en">
  <head>
  <!--  <meta charset="utf-8">   -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Web CinesPmaria">
    <meta name="author" content="FernandoGR">
    <link rel="icon" href="favicon_io/favicon.ico">
    <title>Cines Pmaria</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

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


        echo "Usuario sesion: " . $userLog;
        echo "<br/>Rol sesion: " . $rolUser[0][3];
         }
      $cartelera = Img::listaImg();
      $infoPelis = Peliculas::listaPeliculas();
     ?>

    <!-- navbar -->
      <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand text-white" href="index.php">
            <img src="imagenes/cines_pmaria.jpg" height="50" width="50"  class="rounded-circle">
            Cines Pmaria
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="fas fa-home pr-2"></i>Inicio</a>
              </li>
            <?php
                if(!isset($rol)){
             ?>
              <li class="nav-item">
                <a class="nav-link" href="vista/indexCartelera.php"><i class="fas fa-video pr-2"></i>Cartelera</a>
              </li>

          <?php
          }
          if(isset($rol)){

            if($rol == "ROL_ADMIN"){ // solo admins
          ?>
              <li class="nav-item">
                   <a class="nav-link" href="vista/indexEditUsers.php"><i class="fas fa-user-edit pr-2"></i>Editar Usuarios</a>
             </li>
             <li class="nav-item">
                  <a class="nav-link" href="vista/indexEditEmp.php"><i class="fas fa-user-edit pr-2"></i>Editar empleados</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="vista/indexEditPeli.php"><i class="fas fa-film pr-2"></i>Editar Peliculas</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="vista/indexEditFotos.php"><i class="fas fa-image pr-2"></i>Editar Imagenes Cartelera</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="vista/indexEditHorario.php"><i class="fas fa-user-clock pr-2"></i>Editar horarios</a>
             </li>

           <?php
           }
           if($rol == "ROL_EMP"){ // empleados y admin

            ?>
             <li class="nav-item">
                <a class="nav-link" href="vista/indexVerHor.php"><i class="fas fa-clock pr-2"></i>Ver horarios</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="vista/indexComEmp.php"><i class="fas fa-sms pr-2"></i>Sugerencia de horarios</a>
             </li>
             <?php
                }
                if($rol == "ROL_USER" || $rol == "ROL_ADMIN" || $rol == "ROL_EMP"){ // user, empleado y admin
              ?>

             <li class="nav-item">
               <a class="nav-link" href="vista/indexEditPerfil.php"><i class="fas fa-user-edit pr-2"></i>Editar perfil</a>
             </li>
          <?php
            }
          if($rol == "ROL_USER"){ // user
            ?>
             <li class="nav-item">
                  <a class="nav-link" href="vista/indexComEntrada.php"><i class="fas fa-ticket-alt pr-2"></i>Comprar Entrada</a>
            </li>
          <?php
            }
          }

          if(!isset($rol)){

        ?>
              <li class="nav-item">
                  <a class="nav-link" href="vista/indexContacto.php"><i class="fas fa-search-location pr-2"></i>Contacto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="vista/indexLogin.php"><i class="fas fa-sign-in-alt pr-2"></i>Login</a>
              </li>
          <?php
            }else{
         ?>
               <li class="nav-item">
                 <a class="nav-link" href="controlador/logout.php"><i class="fas fa-sign-out-alt pr-2"></i>Logout</a>
               </li>

           <?php
              }
           ?>
            </ul>
          </div>
        </nav>
      </header>

<main class="mt-3 mx-5  ">

 <!-- carrousel -->
      <div id="carousel" class="carousel slide d-none d-md-block" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel" data-slide-to="0" class="active"></li>
          <li data-target="#carousel" data-slide-to="1"></li>
          <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="imagenes/cartelcines.jpg?auto=yes&bg=777&fg=555&text=First slide" alt="First slide" style='width:640px;height:350px'/>

          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagenes/pasillo.jpg?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide" style='width:640px;height:350px'/>
            <div class="carousel-caption d-none d-md-block">
              <h2 class="text-capitalize font-weight-bold text-dark">Disfruta del espectaculo!!</h2>
                <p class="font-weight-bold text-dark">¡Ven a ver las mejores peliculas con nosotros!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagenes/estrenos.jpg?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide" style='width:640px;height:350px'/>
            <div class="carousel-caption d-none d-md-block">
              <h2 class="text-capitalize font-weight-bold text-dark">Los Mejores Estrenos!!</h2>
              <h4 class="text-dark  font-weight-bold">¡No te los puedes perder!</h4>

            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


<!-- lado izquierda -->

<section class="row mt-3 ">

  <aside class="col-md-3 d-none d-md-block ">

    <i class="fas fa-link"></i>
    <span>Menú</span>
    <ul class="list-unstyled">

      <?php
        if(isset($rol)){
          if($rol == "ROL_USER"){
           ?>

       <li class="nav-item">
         <a class="nav-link text-primary" href="index.php"><i class="fas fa-home pr-2"></i>Inicio <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
          <a class="nav-link text-primary" href="vista/indexEditPerfil.php"><i class="fas fa-user-edit pr-2"></i>Editar Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary" href="vista/indexComEntrada.php"><i class="fas fa-ticket-alt pr-2"></i>Comprar Entrada</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary" href="controlador/logout.php"><i class="fas fa-sign-out-alt pr-2"></i>Logout</a>
        </li>

          <?php
        }else {
          if($rol == "ROL_EMP"){
            ?>
            <li class="nav-item">
              <a class="nav-link text-primary" href="index.php"><i class="fas fa-home pr-2"></i>Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-primary" href="vista/indexVerHor.php"><i class="fas fa-clock pr-2"></i>Ver horarios</a>
             </li>
             <li class="nav-item">
               <a class="nav-link text-primary" href="vista/indexComEmp.php"><i class="fas fa-sms pr-2"></i>Sugerencia horarios</a>
             </li>
             <li class="nav-item">
                <a class="nav-link text-primary" href="vista/indexEditPerfil.php"><i class="fas fa-user-edit pr-2"></i>Editar Perfil</a>
              </li>
             <li class="nav-item">
               <a class="nav-link text-primary" href="controlador/logout.php"><i class="fas fa-sign-out-alt pr-2"></i>Logout</a>
             </li>
            <?php
          }else {
            ?>
            <li class="nav-item active">
              <a class="nav-link text-primary" href="index.php"><i class="fas fa-home pr-2"></i>Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vista/indexEditUsers.php"><i class="fas fa-user-edit pr-2"></i>Editar Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vista/indexEditEmp.php"><i class="fas fa-user-edit pr-2"></i>Editar empleados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vista/indexEditPeli.php"><i class="fas fa-film pr-2"></i>Editar Peliculas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vista/indexEditFotos.php"><i class="fas fa-image pr-2"></i>Editar Imagenes Cartelera</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vista/indexEditHorario.php"><i class="fas fa-user-clock pr-2"></i>Editar horarios</a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-primary" href="vista/indexEditPerfil.php"><i class="fas fa-user-edit pr-2"></i>Editar Perfil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="controlador/logout.php"><i class="fas fa-sign-out-alt pr-2"></i>Logout</a>
            </li>
            <?php
          }
        }


      }else {  // no users
       ?>

      <li class="nav-item active">
        <a class="nav-link text-primary" href="index.php"><i class="fas fa-home pr-2"></i>Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="vista/indexCartelera.php"><i class="fas fa-video pr-2"></i>Cartelera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="vista/indexContacto.php"><i class="fas  fa-search-location  pr-2"></i>Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="vista/indexLogin.php"><i class="fas fa-sign-in-alt pr-2"></i>Login</a>
      </li>


    <?php } ?>

    </ul>

  </aside>

  <!-- medio -->
  <section class="my-3 col-sm-12 col-md-9 col-lg-7">

      <h2 class="text-center text-secondary"> PROXIMOS ESTRENOS</h2>
      <img src="imagenes/estrenos2.jpg" class="img-fluid m-1"  style='width:610px;height:400px'/>
      <br/><br/>
      <h2 class="text-center text-secondary"> CARTELERA ACTUAL</h2>

         <?php
         for($i = 0; $i<6;$i++){      // cartelera actual

           echo "<img src='vista/".$cartelera[$i][1]." 'class='img-fluid m-1' style='width:300px;height:400px' title='" . $infoPelis[$i][1]. "\nSesiones: 18.00-20.30-23.00'/>";

        }
          ?>

          <img src="imagenes/descuento102.jpg" class="img-fluid m-1 mt-4" style='width:610px;height:300px' />


         <!-- imagenes bar y fidelidad -->
         <br/><br/>
         <h2 class="text-center text-secondary"> Precios Populares</h2>
         <img src="imagenes/preciobar.jpg" class="img-fluid m-1"  style='width:610px;height:400px'/>
         <img src="imagenes/preciomiercoles.jpg" class="img-fluid m-1" style='width:610px;height:400px'/>


         <br/>
  </section>

<!-- lado derecho -->
<aside class="col-lg-2 d-none d-lg-block ">

  <span> </span>

  <ul class="list-unstyled ">
    <li>
      <img src="imagenes/cvc.jpg" class="img-fluid my-1">
    </li>
    <li>
    <img src="imagenes/preciobar.jpg" class="img-fluid my-1">
    </li>
    <li>
    <img src="imagenes/palomitas_coke.jpg" class="img-fluid my-1">
    </li>
    <li>
      <img src="imagenes/palotikets.jpg" class="img-fluid my-1">
    </li>
    <li>
      <img src="imagenes/preciomiercoles.jpg" class="img-fluid my-1">
    </li>
    <li>
      <img src="imagenes/descuento102.jpg" class="img-fluid my-1">
    </li>
    <li>
      <a href="https://www.facebook.com/Cines-PMaria-103042904552265/"><img src="imagenes/facebook.jpg" class="img-fluid my-1"></a>
    </li>
    <li>
     <a href="https://www.instagram.com/pmariacines/"><img src="imagenes/instagram.jpg" class="img-fluid my-1"></a>
    </li>

  </ul>

</aside>

</section>


    </main><!-- /.container -->


<!-- Footer -->
<div class="my-5">
  <?php
      include("vista/footer.php");
   ?>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
