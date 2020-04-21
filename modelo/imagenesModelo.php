<?php
//  require_once 'modelo/conexion.php';

  class Img {

    // devuelve todos los datos bbdd de imagenes
    public static function listaImg(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM imagenes");
      $con->cerrarConexion();

      return $cont;
    }

    // inserta una ruta nueva en la sala pasada como parametro
    public static function insertarImg($sala,$ruta){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE imagenes SET ruta= '$ruta' WHERE sala = '$sala'");
      $con->cerrarConexion();
    }
}

?>
