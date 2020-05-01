<header class="sticky-top">

   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
     <a class="navbar-brand text-white" href="../index.php">
       <img src="../imagenes/cines_pmaria.jpg" height="50" width="50" class="rounded-circle">
       Cines Pmaria
     </a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
       <ul class="navbar-nav text-center">
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
             <a class="nav-link" href="indexEditHorario.php"><i class="fas fa-user-clock pr-2"></i>Editar horarios</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="indexEditPeli.php"><i class="fas fa-film pr-2"></i>Editar Peliculas</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="indexEditFotos.php"><i class="fas fa-image pr-2"></i>Cambiar Cartelera</a>
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

           <li class="nav-item active">
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
