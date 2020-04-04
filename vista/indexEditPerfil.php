<?php
  require_once '../model/peliculaDao.php';
  require_once '../modelo/conexion.php';
  require_once '../model/userDao.php';
  //require_once '../model/imagenesDao.php';
  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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
       {

        $userLog = $_SESSION['usuario'];
        $rolUser = Users::userRol($_SESSION['usuario']);
        $rol = $rolUser[0][3];

      }else{
        header("Location:indexLogin.php");
      }
     ?>
    <!-- navbar -->
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand text-white" href="index.html">
            <img src="img/logo.png">
            Cines Pmaria
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="../index.php"><i class="fas fa-home pr-2"></i>Inicio</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="indexCartelera.php"><i class="fas fa-school pr-2"></i>Cartelera</a>
              </li>

          <?php

          if(isset($rol)){

            if($rol == "ROL_ADMIN"){ // solo admins
          ?>
          <li class="nav-item">
            <a class="nav-link" href="../vista/indexEditUsers.php"><i class="fas fa-school pr-2"></i>Editar Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../vista/indexEditEmp.php"><i class="fas fa-school pr-2"></i>Editar empleados</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../vista/indexEditPeli.php"><i class="fas fa-school pr-2"></i>Editar Peliculas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../vista/indexEditFotos.php"><i class="fas fa-user-graduate pr-2"></i>Editar Imagenes Cartelera</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../vista/indexEditHorario.php"><i class="fas fa-user-graduate pr-2"></i>Editar horarios</a>
          </li>

           <?php
           }
           if($rol == "ROL_EMP" || $rol == "ROL_ADMIN"){ // empleados y admin

            ?>
            <li class="nav-item">
               <a class="nav-link" href="../vista/indexVerHor.php"><i class="fas fa-school pr-2"></i>Ver horarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../vista/indexComEmp.php"><i class="fas fa-user-graduate pr-2"></i>Sugerencia de horarios</a>
            </li>
            <?php
               }
               if($rol == "ROL_USER" || $rol == "ROL_ADMIN"){ // user y admin
             ?>

            <li class="nav-item">
              <a class="nav-link" href="../vista/indexEditPerfil.php"><i class="fas fa-user-graduate pr-2"></i>Editar perfil</a>
            </li>

            <li class="nav-item">
                 <a class="nav-link" href="../vista/indexComEntrada.php"><i class="fas fa-school pr-2"></i>Comprar Entrada</a>
           </li>
          <?php
            }
          }
           ?>

           <li class="nav-item">
            <a class="nav-link" href="indexContacto.php"><i class="fas fa-user-graduate pr-2"></i>Contacto</a>
          </li>
        <?php
          if(!isset($rol)){
        ?>
              <li class="nav-item">
                <a class="nav-link" href="../vista/indexLogin.php"><i class="fas fa-chalkboard-teacher pr-2"></i>Login</a>
              </li>
          <?php
            }else{
         ?>
             <li class="nav-item">
               <a class="nav-link" href="../controlador/logout.php"><i class="fas fa-chalkboard-teacher pr-2"></i>Logout</a>
             </li>

           <?php
              }
           ?>
            </ul>
          </div>
        </nav>
      </header>

<main class="mt-3 mx-5 container">

 <!-- carrousel --> 

<!-- lado izquierda -->

<section class="row mt-3">

  <aside class="col-md-3 d-none d-md-block">

    <i class="fas fa-link"></i>
    <span>Menú</span>
    <ul class="list-unstyled">
      <li class="nav-item active">
        <a class="nav-link text-primary" href="index.html"><i class="fas fa-home pr-2"></i>Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="html/centro.html"><i class="fas fa-school pr-2"></i>Cartelera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="html/estudios.html"><i class="fas fa-briefcase pr-2"></i>Contactanos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-primary" href="html/practicas.html"><i class="fas fa-hammer pr-2"></i>Login</a>
      </li>

    </ul>

  </aside>

  <!-- medio -->
  <section class="col-12 col-md-9 col-lg-7">
        <?php

      include("../controlador/editPerfil.php");
         ?>
  </section>

<!-- lado derecho -->
<aside class="col-lg-2 d-none d-lg-block">
  <i class="fas fa-link"></i>
  <span>Enlaces</span>

  <ul class="list-unstyled">
    <li>
      <a href="https://ec.europa.eu/regional_policy/es/funding/erdf/"><img src="img/link1.jpg" class="img-fluid"></a>
    </li>
    <li>
      <a href="https://www.gva.es/va/inicio/presentacion"><img src="img/link2.png" class="img-fluid"></a>
    </li>
    <li>
      <a href="https://sites.iesperemaria.com/comenius/"><img src="img/link3.jpg" class="img-fluid"></a>
    </li>
    <li>
      <a href="https://e5.onthehub.com/WebStore/ProductsByMajorVersionList.aspx?ws=9c0feb28-729b-e011-969d-0030487d8897&vsro=8"><img src="img/link4.jpg" class="img-fluid"></a>
    </li>
    <li>
      <a href="https://fct.edu.gva.es/"><img src="img/link5.png" class="img-fluid"></a>
    </li>

  </ul>

</aside>

</section>


    </main><!-- /.container -->


<!-- Footer -->
<footer class="bg-primary text-white row pt-5 mx-5">

  <div class="col-sm-6 col-lg-3 text-center">
    <div>
      <img src="img/logo.png" class="logo-footer" width="100px">
    </div>

    IES Pere Maria Orts i Bosch
    Telf: 966.87.07.00
    Fax: 966.87.07.01
    Correo Electrónico:
    03010132@gva.es
  </div>
  <div class="col-sm-6 col-lg-3 text-center text-lg-left">
    <div class="font-weight-bold">
      Enlaces 1
    </div>
    <ul class="list-unstyled">
      <li><a class="text-white" href="#">Cool Stuff</a></li>
      <li><a class="text-white" href="#">Random Feature</a></li>
      <li><a class="text-white" href="#">Team Feature</a></li>
      <li><a class="text-white" href="#">Stuff Developers</a></li>
      <li><a class="text-white" href="#">Another One</a></li>
      <li><a class="text-white" href="#">Last Time</a></li>
    </ul>
  </div>
  <div class="col-sm-6 col-lg-3 text-center text-lg-left">
    <div class="font-weight-bold">
      Enlaces 2
    </div>
    <ul class="list-unstyled">
      <li><a class="text-white" href="#">Resource</a></li>
      <li><a class="text-white" href="#">Resource Name</a></li>
      <li><a class="text-white" href="#">Another Resource</a></li>
      <li><a class="text-white" href="#">Final Resource</a></li>

    </ul>
  </div>
  <div class="col-sm-6 col-lg-3 text-center text-lg-left">
    <div class="font-weight-bold">
      Enlaces 3
    </div>
    <ul class="list-unstyled">
      <li><a class="text-white" href="#">Team</a></li>
      <li><a class="text-white" href="#">Locations</a></li>
      <li><a class="text-white" href="#">Privacy</a></li>
      <li><a class="text-white" href="#">Terms</a></li>

    </ul>
  </div>


</footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
