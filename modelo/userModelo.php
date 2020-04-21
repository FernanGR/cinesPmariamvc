<?php
  //require_once '../modelo/conexion.php';

  class Users {

    // devuelve todos los usuarios (rol user)
    public static function listaUsuarios(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM usuarios WHERE ROL LIKE 'ROL_USER'");
      $con->cerrarConexion();

      return $cont;
    }

    // devuelve todos los empleados (rol emp)
    public static function listaEmpleados(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM usuarios WHERE ROL LIKE 'ROL_EMP'");
      $con->cerrarConexion();

      return $cont;
    }

    // devuelve todos los usuarios de la bbdd
    public static function listaTodos(){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * FROM usuarios");
      $con->cerrarConexion();

      return $cont;
    }

    //actualiza datos de un usuario donde se pasan todos los datos y el nombre del antiguo.
    public static function actualizarUser($usuario, $newUser, $contrasena, $email, $activo, $rol, $horario){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE usuarios SET usuario='$newUser', contrasena= '$contrasena',
         email= '$email', activo= '$activo', ROL = '$rol' , horario= '$horario' WHERE usuario = '$usuario'");
      $con->cerrarConexion();
    }

    //elimina un usuario pasandole nombre de este por parametro
    public static function eliminarUser($usuario){
      $con = new Conexion();
      $con->ejecutarActualizacion("DELETE FROM usuarios WHERE usuario='$usuario'");
      $con->cerrarConexion();

    }

    //  añade un empleado nuevo pasandole nombre, contraseña, email y rol. añade un nuevo horario a la bbdd horarios
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

    //  añade un usuario nuevo pasandole nombre, contraseña, email y rol
    public static function añadirUsuario($user,$pass,$email,$rol){

      $con = new Conexion();
      $con->ejecutarActualizacion("INSERT INTO usuarios (usuario,contrasena,email,ROL) VALUES ('$user' , '$pass', '$email','$rol')");
      $con->cerrarConexion();
    }

    // devuelve datos de un usuario con nombre y contraseña por parametro
    public static function loginUsuario($user,$pass){

      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * from usuarios WHERE usuario = '$user' AND contrasena = '$pass'");
      $con->cerrarConexion();
      return $cont;
    }

    //devuelve todos los datos de un usuario pasado por parametro
    public static function userActual($user){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * from usuarios WHERE usuario = '$user'");
      $con->cerrarConexion();
      return $cont;
    }

    // actualiza un usuario pasandole nombre,nuevo nombre, contraseña y email
    public static function actualizarPerfil($usuario, $newUser, $contrasena, $email){
      $con = new Conexion();
      $con->ejecutarActualizacion("UPDATE usuarios SET usuario='$newUser', contrasena= '$contrasena', email= '$email'  WHERE usuario = '$usuario'");
      $con->cerrarConexion();
    }

    //devuelve todos los datos de un usuario pasado por parametro
    public static function userRol($user){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT * from usuarios WHERE usuario = '$user'");
      $con->cerrarConexion();
      return $cont;
    }

    // devuelve email de un usuario
    public static function emailUser($user){
      $con = new Conexion();
      $cont = $con->ejecutarConsulta("SELECT email from usuarios WHERE usuario = '$user'");
      $con->cerrarConexion();
      return $cont;
    }
  }


 ?>
