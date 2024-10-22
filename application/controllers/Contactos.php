<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        redirect('contactos/principal');
    }

    public function principal(){
        $this->load->view('contactos');
    }
}