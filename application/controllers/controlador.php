<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->helpers("form");
		$this->load->helpers("url");
		$this->load->model("usuario_model");
	}

	public function index()
	{
		$data['arrUsuario']=$this->usuario_model->recuperar_usuarios();
		$this->load->view("CRUD/header");
		$this->load->view("CRUD/menu");
		$this->load->view("CRUD/tabla",$data);
		$this->load->view("CRUD/footer");
	}

	public function agregar()
	{
		$this->load->view("CRUD/header");
		$this->load->view("CRUD/menu");
		$this->load->view("CRUD/formulario1");
		$this->load->view("CRUD/footer");
	}

	public function modificar()
	{
		$data['arrUsuario']=$this->usuario_model->recuperar_usuarios();
		$this->load->view("CRUD/header");
		$this->load->view("CRUD/menu");
		$this->load->view("CRUD/formulario2",$data);
		$this->load->view("CRUD/footer");
	}

	function formulario()
	{
		if($this->input->post("btnAgregar"))
		{
			$nombre=$this->input->post("nombre");
			$apellido=$this->input->post("apellido");
			$usuario=$this->input->post("usuario");
			$contraEncrip=md5($this->input->post("contrasenia"));
			$this->usuario_model->agregar($nombre,$apellido,$usuario,$contraEncrip);
			$this->index();
		}
		elseif ($this->input->post('btnEliminar'))
		{
			$data['arrUsuario']=$this->usuario_model->recuperar_usuarios();
			$id=$this->input->post('id');
			$this->usuario_model->eliminar($id);
			$respuesta=$this->respuesta();
		return $respuesta;
		}
		elseif ($this->input->post('btnModificar'))
		{
			$id=$this->input->post('id');
			$nombre = $this->input->post('nombre');
			$apellido = $this->input->post('apellido');
			$usuario = $this->input->post('usuario');
			$contrasenia = $this->input->post('contrasenia');
			$contraEncrip=md5($contrasenia);
			$this->usuario_model->modificar($id,$nombre, $apellido, $usuario, $contraEncrip);
		}
		$respuesta=$this->respuesta();
		return $respuesta;
	}
	function respuesta(){
	$data=$this->usuario_model->recuperar_usuarios();
	echo "<table class='table table-striped table-hover'>
	<tr>
          <th>id</th>
          <th>nombre</th>
          <th>apellido</th>
          <th>usuario</th>
          <th>aciones</th>
        </tr>";
    foreach ($data ->result() as $usuario) {
    	echo"<tr>
  <td>".$usuario->IDUSUARIO."<input type='text' name='idProc' hidden='true' value='".$usuario->IDUSUARIO."'></td>
  <td>".$usuario->NOMBRE."</td>
  <td>".$usuario->APELLIDO."</td>
  <td>".$usuario->USUARIO."</td>
  <td><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modModificar' id='btnModal'onClick=\"selecPersona('$usuario->IDUSUARIO','$usuario->NOMBRE','$usuario->APELLIDO','$usuario->USUARIO')\">accion</button></td>
  </tr>";
    }
    echo "</table>";
}
}
?>