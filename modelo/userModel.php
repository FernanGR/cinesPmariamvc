<?php

class Usuarios{
  private $usuario;
  private $contrasena;
  private $email;
  private $rol;
  private $activo;
  private $horario;
/*
  public function __construct(){
    $this->usuario = "";
    $this->contrasena = "";
    $this->email = "";
    $this->rol = "";
    $this->activo = 1;
    $this->horario = -1;

  }*/

  public function __construct($us,$con,$email,$rol,$horario){
    $this->usuario = $us;
    $this->contrasena = $con;
    $this->email = $email;
    $this->rol = $rol;
    $this->activo = 1;
    $this->horario = $horario;
  }

  public function __getUser(){
    return $this->usuario;
  }
  public function __getContrasena(){
    return $this->contrasena;
  }
  public function __getEmail(){
    return $this->email;
  }
  public function __getRol(){
    return $this->rol;
  }
  public function __getActivo(){
    return $this->activo;
  }
  public function __getHorario(){
    return $this->horario;
  }
 }






 ?>
