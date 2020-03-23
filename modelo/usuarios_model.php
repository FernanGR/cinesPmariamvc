<?php
/*
class Usuarios_model{

	private $db;
	private $usuarios;
	private $empleados;

	public function __construct(){
		require_once("modelo/conectar.php");
		$this->db =Conectar::conexion();
		$this->usuarios = array();
		$this->empleados = array();
	}

	public function get_usuarios(){
		$consulta=$this->db->query("SELECT * FROM usuarios WHERE ROL LIKE 'ROL_USER'");
		while($resultado = $consulta->fetch(PDO::FETCH_ASSOC)){
			$this->usuarios[]=$resultado;
		}
		return $this->usuarios;
	}

	public function get_empleados(){
		$consulta=$this->db->query("SELECT * FROM usuarios WHERE ROL LIKE 'ROL_EMP'");
		while($resultado = $consulta->fetch(PDO::FETCH_ASSOC)){
			$this->empleados[]=$resultado;

		}
		return $this->empleados;

	}

}
*/
?>
