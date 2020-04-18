<?php
  require_once '../dao/peliculaDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/userDao.php';
  require_once '../dao/imagenesDao.php';
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
    <link href="../css/style.css" rel="stylesheet">

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
          <a class="navbar-brand text-white" href="../index.php">
            <img src="../imagenes/cines_pmaria.jpg" height="50" width="50" class="rounded-circle">
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

              if($rol == "ROL_USER"){  //user
                 ?>
                 <li class="nav-item">
                   <a class="nav-link" href="indexCartelera.php"><i class="fas fa-video pr-2"></i>Cartelera</a>
                 </li>

                <li class="nav-item active">
                     <a class="nav-link" href="../vista/indexComEntrada.php"><i class="fas fa-ticket-alt pr-2"></i>Comprar Entrada</a>
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
              }

              if(!isset($rol)){

                ?>
                <li class="nav-item">
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

 <!-- carrousel -->
<!-- lado izquierda -->

<?php
/*
<section class="row mt-3">

  <aside class="col-md-3 d-none d-md-block">

    <i class="fas fa-link text-success"></i>
    <span class="text-success">Menú</span>

    <ul class="list-unstyled">

            <li class="nav-item">
              <a class="nav-link text-primary" href="../index.php"><i class="fas fa-home pr-2"></i>Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="indexEditPerfil.php"><i class="fas fa-user-edit pr-2"></i>Editar Perfil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="indexComEntrada.php"><i class="fas fa-ticket-alt pr-2"></i>Comprar Entrada</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="../controlador/logout.php"><i class="fas fa-sign-out-alt pr-2"></i>Logout</a>
            </li>

          </ul>

  </aside>

    <section class="col-sm-12 col-md-9 col-lg-9">
*/
 ?>

  <!-- medio -->
<section class="row mt-5  mx-3">
        <?php
          include("comprarEntrada.php");
         ?>
  </section>

<!-- lado derecho -->




    </main><!-- /.container -->

    <!-- Footer -->
<footer>
    <div class="my-3">
      <?php
          include("footer.php");
       ?>
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
