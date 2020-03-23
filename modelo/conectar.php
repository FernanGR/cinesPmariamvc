<?php

class Conectar
{
	public static function conexion(){

			try{
			$conexion = new PDO('mysql:host=localhost;dbname=cinespmaria', 'root', '');
		//	$conexion = new PDO('localhost','root','','cinespmaria');

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$conexion->exec("SET CHARACTER SET UTF8");
		}catch(Exception $e){
			die("Error" . $e->getMessage());

			echo "Linea del error " . $e->getLinea();
		}
		return $conexion;
		}
	}
	/*  static public $mvc_bd_hostname = "localhost";
		static public $mvc_bd_nombre = "cinespmaria";
		static public $mvc_bd_usuario = "root";
		static public $mvc_bd_clave = "";
		static public $mvc_css = "estilo.css"; */
?>
