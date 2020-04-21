<?php
//  require_once 'modelo/conexion.php';

  class Puntuacion {

    // devuelve todos los datos bbdd de valoraciones
    public static function puntuaciones(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM puntuacion");
      $con->cerrarConexion();

      return $cont;
    }

    // devuelve todos los datos bbdd de valoraciones de una pelicula
    public static function puntuacionPeli($peli){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM puntuacion WHERE pelicula = '$peli'");
      $con->cerrarConexion();

      return $cont;
    }

    // inserta una puntuacion por ese usuario en esa pelicula
    public static function insertaPuntuacion($usuario,$pelicula,$puntuacion){
      $con = new Conexion();
      $con->ejecutarActualizacion("INSERT INTO puntuacion (usuario,pelicula,valor) VALUES ('$usuario' , '$pelicula', '$puntuacion')");
      $con->cerrarConexion();
    }


    // actualiza una puntuacion ya existente por ese usuario en esa pelicula
    public static function actualizarPuntuacion($usuario,$pelicula,$puntuacion){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE puntuacion SET  valor = '$puntuacion'
        WHERE usuario= '$usuario' && pelicula = '$pelicula'");
      $con->cerrarConexion();
    }

    // resetea la puntuacion a 0 de esa pelicula
    public static function resetPuntuacion($pelicula){
      $con = new Conexion();
      $con->ejecutarActualizacion("DELETE FROM puntuacion WHERE pelicula='$pelicula'");
       $con->cerrarConexion();
    }


}

?>
