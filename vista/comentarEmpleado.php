<?php
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';
  require_once '../dao/peliculaDao.php';
  require_once '../dao/horarioDao.php';

 ?>

 <h2> Añade sugerencia de horarios </h2>

   <form name = "formulario" method="GET" action= '../controlador/comentHorario.php'>
     <input type="hidden" name="email" value="cinespmaria@gmail.com" />
     <input type="hidden" name="user" value="Fran" <?php // echo $resultado[0]  ?> />

    <p><textarea name="comentario" placeholder="Comparte tu comentario sobre horarios"></textarea></p>

      <input type="submit" value="Enviar mensaje">
   </form>
