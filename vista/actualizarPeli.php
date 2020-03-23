<?php

  require_once '../dao/peliculaDao.php';
  require_once '../modelo/conexion.php';


session_start();


       $sala = $_GET['sala'];
       $nombre = $_GET['peli'];
       $descripcion = $_GET['descripcion'];

       Peliculas::actualizarPelicula($sala,$nombre,$descripcion);

     header("Location:verPeliculas.php");


 ?>
