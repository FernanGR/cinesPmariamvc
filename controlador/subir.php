<?php
  require_once '../modelo/conexion.php';
  require_once '../dao/imagenesDao.php';

  $sala = $_POST['sala'];
  $usuario = $_GET['usuario'];
//capturamos los datos del fichero subido
$type=$_FILES['img_up']['type'];
$tmp_name = $_FILES['img_up']["tmp_name"];
$name = $_FILES['img_up']["name"];
//Creamos una nueva ruta (nuevo path)
//Así guardaremos nuestra imagen en la carpeta "images"
$nuevo_path="../imgPeliculas/".$name;
//Movemos el archivo desde su ubicación temporal hacia la nueva ruta
# $tmp_name: la ruta temporal del fichero
# $nuevo_path: la nueva ruta que creamos
move_uploaded_file($tmp_name,$nuevo_path);
//Extraer la extensión del archivo. P.e: jpg
# Con explode() segmentamos la cadena de acuerdo al separador que definamos. En este caso punto (.)
$array=explode('.',$nuevo_path);
# Capturamos el último elemento del array anterior que vendría a ser la extensión
$ext= end($array);
//Imprimimos un texto de subida exitosa.
echo "<h3>La imagen se subio correctamente</h3>";
// Los posible valores que puedes obtener de la imagen son:
/*
echo "<b>Info de la imagen subida:</b>";
echo "<br> Nombre: ".$_FILES['img_up']["name"];      //nombre del archivo
echo "<br> Tipo: ".$_FILES['img_up']["type"];      //tipo
echo "<br> Nombre Temporal: ".$_FILES['img_up']["tmp_name"];  //nombre del archivo de la imagen temporal
echo "<br> Tamanio: ".$_FILES['img_up']["size"]." bytes";      //tamaño
*/
Img::insertarImg($sala,$nuevo_path);

header("Location:../controlador/editarFotos.php?admin=$usuario");

?>
