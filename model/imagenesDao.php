<?php
//  require_once 'modelo/conexion.php';

  class Img {
    public static function listaImg(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM imagenes");
      $con->cerrarConexion();

      return $cont;
    }

    public static function insertarImg($sala,$ruta){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE imagenes SET ruta= '$ruta' WHERE sala = '$sala'");
      $con->cerrarConexion();
    }
}

?>
