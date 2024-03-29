<?php
  class Conexion{
    private $servidor;
    private $usuario;
    private $clave;
    private $base;
    private $conexion;

    public function __construct(){
      $this->servidor = "localhost";
      $this->usuario = "root";
      $this->clave = "";
      $this->base = "cinespmaria";

      $this->conexion = new mysqli($this->servidor, $this->usuario,
      $this->clave, $this->base);
    }

      // función que devuelve la ejecución 
    public function ejecutarConsulta( $sql){
      $contenedor = $this->conexion->query($sql);
      return $contenedor->fetch_all();
    }

    // función que ejecuta secuencia
    public function ejecutarActualizacion($sql){
      $this->conexion->query($sql);
    }

    public function cerrarConexion(){
      $this->conexion->close();
    }
  }
 ?>
