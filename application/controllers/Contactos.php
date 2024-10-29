<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller {
    public $datos = array();
    public $lista = array();  
    
    public function __construct(){
        parent::__construct();
        if($this->session->userdata("id_user")){
            $this->load->model('contact');
        }
    }
    public function index(){
        $this->load->view('contactos');
    }

    public function principal(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('apellido',"Apellido","required|trim|strtolower");
        $this->form_validation->set_rules('nombre',"Nombre","required|trim|strtolower");
        $this->form_validation->set_rules('email',"Email","required|trim|strtolower");
        $this->form_validation->set_rules('tel',"Tel","required|trim|strtolower");

        if($this->form_validation->run() == FALSE){
            $this->load->view('contactos',$this->datos);
        }else{

            
            $data['id_user']= $this->session->userdata("id_user");
            $data['apellido']=set_value('apellido');
            $data['nombre']=set_value('nombre');
            $data['email']=set_value('email');
            $data['tel']=set_value('tel');

            $this->contact->agregar($data);
            redirect('contactos/index');
            
        }
    }

    public function listar()
    {
        $is_user = $this->session->userdata("id_user");     
        $lista = [];  
        $lista["contactos"] = $this->contact->listar_id($is_user);

        $this->load->view("contactos", $lista);
    }
    public function eliminar(){
        
    }
}