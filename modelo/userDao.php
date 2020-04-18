<?php
  //require_once '../modelo/conexion.php';

  class Users {
    public static function listaUsuarios(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM usuarios WHERE ROL LIKE 'ROL_USER'");
      $con->cerrarConexion();

      return $cont;
    }

    public static function listaEmpleados(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM usuarios WHERE ROL LIKE 'ROL_EMP'");
      $con->cerrarConexion();

      return $cont;
    }

    public static function actualizarUser($usuario, $newUser, $contrasena, $email, $activo, $rol, $horario){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE usuarios SET usuario='$newUser', contrasena= '$contrasena', email= '$email', activo= '$activo', ROL = '$rol' , horario= '$horario' WHERE usuario = '$usuario'");
      $con->cerrarConexion();
    }

    public static function eliminarUser($usuario){
      $con = new Conexion();
      $con->ejecutarActualizacion("DELETE FROM usuarios WHERE usuario='$usuario'");
      $con->cerrarConexion();

    }

    public static function añadirEmp($user,$pass,$email,$rol){

      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM usuarios WHERE ROL LIKE 'ROL_EMP'");
      
      $i = 0;
      foreach ($cont as $resultado)
      {
        if($resultado[5] > $i)
        $i = $resultado[5];
      }
      $horario = $i+1;

      $con->ejecutarActualizacion("INSERT INTO usuarios (usuario,contrasena,email,ROL,horario) VALUES ('$user' , '$pass', '$email','$rol','$horario')");
      $con->ejecutarActualizacion("INSERT INTO horarios (horario) VALUES ('$horario')");
      $con->cerrarConexion();
    }

    public static function añadirUsuario($user,$pass,$email,$rol){

      $con = new Conexion();
      $con->ejecutarActualizacion("INSERT INTO usuarios (usuario,contrasena,email,ROL) VALUES ('$user' , '$pass', '$email','$rol')");
      $con->cerrarConexion();
    }

    public static function loginUsuario($user,$pass){

      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * from usuarios WHERE usuario = '$user' AND contrasena = '$pass'");
      $con->cerrarConexion();
      return $cont;
    }

    public static function userActual($user){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * from usuarios WHERE usuario = '$user'");
      $con->cerrarConexion();
      return $cont;
    }

    public static function actualizarPerfil($usuario, $newUser, $contrasena, $email){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE usuarios SET usuario='$newUser', contrasena= '$contrasena', email= '$email'  WHERE usuario = '$usuario'");
      $con->cerrarConexion();
    }

    public static function userRol($user){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * from usuarios WHERE usuario = '$user'");
      $con->cerrarConexion();
      return $cont;
    }



  }


 ?>
