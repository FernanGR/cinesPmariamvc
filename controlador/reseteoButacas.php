<?php


  require_once '../dao/horarioDao.php';
  require_once '../dao/peliculaDao.php';
  require_once '../dao/userDao.php';
  require_once '../modelo/conexion.php';

session_start();

   //sala 1 y 2
   // 1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
  //  1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
   //$conexion = new mysqli('localhost','root','','cinespmaria');
  // $consulta = $conexion->query("SELECT * FROM peliculas WHERE sala = 1 or sala = 2 ");
  //$resultado = $consulta->fetch_assoc();
   /*$peli1 = Peliculas::sala12();
   $disponibilidad = $peli1[3];
   for($i = 0; $i < strlen($disponibilidad); $i++)
   {
       $disponibilidad[$i] = 1; //  para poner todo a 1 de nuevo.(disponibles) ( borrar el if antes)
   }

  //  $conexion = new mysqli('localhost','root','','cinespmaria');
  //$consulta = $conexion->query("UPDATE peliculas SET disponibilidad = '" . $disponibilidad . "' WHERE sala = 1 or sala = 2 ");
  Peliculas::actualizaButaca12($disponibilidad);

  //sala 3 al 6
  // 1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
  //$consulta = $conexion->query("SELECT * FROM peliculas WHERE sala = 6 ");
  //$resultado = $consulta->fetch_assoc();
  //$disponibilidad = $resultado['disponibilidad'];

  $peli2 =  Peliculas::sala3456();
  $disponibilidad = $peli2[3];
  for($i = 0; $i < strlen($disponibilidad); $i++)
  {

      $disponibilidad[$i] = 1; //  para poner todo a 1 de nuevo.(disponibles) ( borrar el if antes)
 }

//  $conexion = new mysqli('localhost','root','','cinespmaria');
//  $consulta = $conexion->query("UPDATE peliculas SET disponibilidad = '" . $disponibilidad . "' WHERE sala = 3 or sala = 4 or sala = 5 or sala = 6 ");
Peliculas::actualizaButaca3456($disponibilidad);
*/
  Peliculas::reseteoButacas();

     header("Location:../vista/indexEditHorario.php");


 ?>
