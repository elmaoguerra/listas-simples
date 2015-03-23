<?php

class ContenidoController extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->very_session();

	}

	public function index(){
		$data = array('usuariosession' => $this->session->userdata('nombre'));
		$this->load->view('contenido',$data);
		//echo "Bienvenido: ".$this->session->userdata('nombre');
		
	}

	public function very_session(){
		if(!$this->session->userdata('nombre')){
			redirect(base_url().'LoginController/index');
		}
	}
}

?>