<?php
  require_once '../modelo/peliculaModelo.php';
  require_once '../modelo/conexion.php';

   $sala = $_POST['sala'];
   $nombre = $_POST['peli'];
   $descripcion = $_POST['descripcion'];

   Peliculas::actualizarPelicula($sala,$nombre,$descripcion);

   header("Location:../vista/indexEditPeli.php");

 ?>
