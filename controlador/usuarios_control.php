<?php

  require_once("modelo/usuarios_model.php");

  $usuarios = new Usuarios_model();

  $users = $usuarios->get_usuarios();


  require_once("vista/usuarios_view.php");



 ?>
