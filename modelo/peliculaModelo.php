<?php
  //require_once 'modelo/conexion.php';

  class Peliculas {

    // devuelve sala nombre descripcion sin repetirse
    public static function listaPeliculas(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT DISTINCT sala,nombre,descripcion FROM peliculas");
      $con->cerrarConexion();

      return $cont;
    }


    // actualiza nombre y descripcion de la sala pasada como parametro
    public static function actualizarPelicula($sala,$nombre, $descripcion){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE peliculas SET nombre='$nombre', descripcion='$descripcion' WHERE sala = '$sala '");
      $con->cerrarConexion();
    }

    // devuelve nombre de las películas sin repetir
    public static function nombrePeliculas(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT DISTINCT nombre FROM peliculas");
      $con->cerrarConexion();

      return $cont;

    }

    // devuelve las sesiones de las peliculas sin repetir
    public static function sesionesPeliculas(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT DISTINCT sesion FROM peliculas");
      $con->cerrarConexion();

      return $cont;

    }

    // devuelve la cadena de 1 de la pelicula, sesion y dia indicados
    public static function dispoPeliculas($peli,$sesion,$dia){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM peliculas where nombre = '". $peli . "' and  sesion = '". $sesion ."'   and  dia = '". $dia ."'");
      $con->cerrarConexion();

      return $cont;

    }

    // devuelve  todos datos de la película pasada como parametro
    public static function encuentraSala($peli){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM peliculas where nombre = '". $peli . "'" );
      $con->cerrarConexion();

      return $cont;

    }

    //devuelve todos los datos de las películas de la sala 1 y 2
    public static function sala12(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM peliculas WHERE sala = 1 or sala = 2 ");
      $con->cerrarConexion();

      return $cont;

    }


    // resetea todo a 1 las disponibilidades
    public static function reseteoButacas(){                          // 11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
      $con = new Conexion();                                            
      $con->ejecutarActualizacion("UPDATE peliculas SET  disponibilidad='11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111' WHERE  sala = 1 or sala = 2");
      $con->ejecutarActualizacion("UPDATE peliculas SET  disponibilidad='1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111' WHERE  sala = 3 or sala = 4 or sala = 5 or sala = 6");

      $con->cerrarConexion();
    }

    // actualiza la disponibilidad de la película, sesion y día pasados como parametros.
    public static function actualizaButacas($disponibilidad,$peli,$sesion,$dia){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE peliculas SET disponibilidad = '" . $disponibilidad . "' WHERE nombre = '" . $peli. "'  and dia = '" . $dia . "' and sesion = '" . $sesion . "'");
      $con->cerrarConexion();
    }
  }


 ?>
