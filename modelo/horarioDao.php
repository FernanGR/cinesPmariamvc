<?php
  require_once '../modelo/conexion.php';

  class Horario {
    public static function listaHorario(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM horarios");
      $con->cerrarConexion();

      return $cont;
    }



    public static function actualizarHorario($emp,$lunes, $martes,$miercoles,$jueves, $viernes, $sabado, $domingo){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE horarios SET lunes= '$lunes', martes= '$martes', miercoles= '$miercoles', jueves= '$jueves',viernes= '$viernes', sabado = '$sabado', domingo = '$domingo' WHERE horario = '$emp'");
      $con->cerrarConexion();
    }

    public static function listaHorEmp($hor){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM horarios WHERE horario = " . $hor);
      $con->cerrarConexion();

      return $cont;

    }

  }


 ?>
