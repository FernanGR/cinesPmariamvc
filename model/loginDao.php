<?php
  require_once 'modelo/conexion.php';

  class Login {
    public static function chequear(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * from usuarios WHERE usuario = '$usuario' AND contrasena = '$pass'");
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
