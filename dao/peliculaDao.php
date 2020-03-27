<?php
  require_once '../modelo/conexion.php';

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

    public static function nombrePeliculas(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT DISTINCT nombre FROM peliculas");
      $con->cerrarConexion();

      return $cont;

    }

    public static function sesionesPeliculas(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT DISTINCT sesion FROM peliculas");
      $con->cerrarConexion();

      return $cont;

    }

    public static function dispoPeliculas($peli,$sesion,$dia){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM peliculas where nombre = '". $peli . "' and  sesion = '". $sesion ."'   and  dia = '". $dia ."'");
      $con->cerrarConexion();

      return $cont;

    }

    public static function sala12(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM peliculas WHERE sala = 1 or sala = 2 ");
      $con->cerrarConexion();

      return $cont;

    }
/*
    public static function sala3456(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM peliculas WHERE sala = 6 ");
      $con->cerrarConexion();

      return $cont;

    }

    public static function actualizaButaca12($disponibilidad){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE peliculas SET disponibilidad = '" . $disponibilidad . "' WHERE sala = 1 or sala = 2 ");
      $con->cerrarConexion();
    }

    public static function actualizaButaca3456($disponibilidad){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE peliculas SET disponibilidad = '" . $disponibilidad . "' WHERE sala = 3 or sala = 4 or sala = 5 or sala = 6 ");
      $con->cerrarConexion();
    }*/

    public static function reseteoButacas(){                          // 11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
      $con = new Conexion();                                          //  111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
      $con->ejecutarActualizacion("UPDATE peliculas SET  disponibilidad='11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111' WHERE  sala = 1 or sala = 2");
      $con->ejecutarActualizacion("UPDATE peliculas SET  disponibilidad='1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111' WHERE  sala = 3 or sala = 4 or sala = 5 or sala = 6");

      $con->cerrarConexion();
    }

    public static function actualizaButacas($disponibilidad,$peli,$sesion,$dia){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE peliculas SET disponibilidad = '" . $disponibilidad . "' WHERE nombre = '" . $peli. "'  and dia = '" . $dia . "' and sesion = '" . $sesion . "'");
      $con->cerrarConexion();
    }
  }


 ?>
