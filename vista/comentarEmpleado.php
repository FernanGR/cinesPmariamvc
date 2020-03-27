<?php
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/peliculaDao.php';
  require_once '../dao/horarioDao.php';

  
  session_start();
  $usuario = $_SESSION['usuario'];
  echo "Usuario: " . $usuario;

 ?>

 <h2> Añade sugerencia de horarios </h2>

   <form name = "formulario" method="GET" action= '../controlador/comentHorario.php'>
     <input type="hidden" name="email" value="cinespmaria@gmail.com" />
     <input type="hidden" name="user" value= <?php  echo $usuario  ?> />
     <p><textarea name="comentario" placeholder="Comparte tu comentario sobre horarios"></textarea></p>
     <input type="submit" value="Enviar mensaje">
   </form>
  <!-- cancelar -->
  <!-- <form name="cancela" method="post" action= '../index.php'>
     <input type="hidden" name="user" value= <?php  echo $usuario  ?> />
     <input type="hidden" name="rol" value="ROL_EMP"/>
     <input type="submit" value="Cancelar" />
   </form>   -->
   <a href='../index.php?user=<?php echo $usuario ?>&rol=ROL_EMP'><button>Volver al Menu</button></a>
