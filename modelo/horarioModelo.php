<?php
  require_once 'conexion.php';

  class Horario {

    // devuelve todos los horarios
    public static function listaHorario(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM horarios");
      $con->cerrarConexion();

      return $cont;
    }


    // función actualiza horario de la semana entera de un empleado
    public static function actualizarHorario($emp,$lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $domingo){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE horarios SET lunes= '$lunes', martes= '$martes', miercoles= '$miercoles',
        jueves= '$jueves',viernes= '$viernes', sabado = '$sabado', domingo = '$domingo' WHERE horario = '$emp'");
      $con->cerrarConexion();
    }

    // devuelve  horarios del empleado con horario pasado como parametro.
    public static function listaHorEmp($hor){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM horarios WHERE horario = " . $hor);
      $con->cerrarConexion();

      return $cont;
    }

  }


 ?>
