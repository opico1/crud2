<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	function agregar($nombre,$apellido,$usuario,$contrasenia)
	{
		$this->db->query("INSERT INTO usuario(NOMBRE,APELLIDO,USUARIO,CONTRASENIA) VALUES ('$nombre', '$apellido', '$usuario', '$contrasenia')");
	}
	function recuperar_usuarios()
	{
		$query=$this->db->query("SELECT * FROM usuario WHERE ELIMINADO=0");
		return $query;
	}
	function eliminar($id)
	{
		$this->db->query("UPDATE usuario SET ELIMINADO=1 WHERE IDUSUARIO=$id");
	}

	function modificar($id, $nombre, $apellido, $usuario, $contrasenia)
	{
		$this->db->query("UPDATE usuario SET NOMBRE='$nombre', APELLIDO='$apellido', USUARIO='$usuario', CONTRASENIA='$contrasenia' WHERE IDUSUARIO=$id");
	}
}
?>