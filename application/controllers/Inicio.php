<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		redirect('inicio/login');
	}
	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre','Usuario','trim|required|strtolower');
		$this->form_validation->set_rules('clave','Clave','required');

		$this->load->model('usuarios');
		$user = set_value("nombre");
		$clave = set_value("clave");

		if($id_u = $this->usuarios->check_login($user, $clave)){
			$u = $this->usuarios->get_byId($id_u);
			$this->session->set_userdata("id_user",$id_u);
			$this->session->set_userdata("usuario",$u["nombre"]);
			redirect("contactos/principal");
		}
		// if($this->form_validation->run() == FALSE){
		// 	$this->load->view('inicio');
		// }else{
		// 	$this->load->models('usuarios');
		// 	$user = set_value("nombre");
        //     $clave = set_value("clave");
		// 	if($id_u = $this->usuarios->check_login($user, $clave)){
		// 		$u = $this->usuarios->get_byId($id_u);
		// 		$this->session->set_userdata("id_user",$id_u);
		// 		$this->session->set_userdata("usuario",$u["nombre"]);
		// 		redirect("contactos/principal");
		// 	}else{
		// 		$this->session->set_flashdata("OP","NoUser");
		// 		redirect("inicio/login");
		// 	}
		// }	
	
	}
}
