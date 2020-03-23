<?php
  require_once '../modelo/conexion.php';
  require_once '../modelo/userModel.php';

  class Peliculas {
    public static function listaPeliculas(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT DISTINCT sala,nombre,descripcion FROM peliculas");
      $con->cerrarConexion();

      return $cont;
    }



    public static function actualizarPelicula($sala,$nombre, $descripcion){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE peliculas SET nombre='$nombre', descripcion='$descripcion' WHERE sala = '$sala '");
      $con->cerrarConexion();
    }



  }


 ?>
