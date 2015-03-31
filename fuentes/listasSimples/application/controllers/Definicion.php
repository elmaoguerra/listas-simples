<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Definicion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		 $this->_validar_session();
	}

	public function index()
	{	
		$datos['titulo'] = "Definición";
		$datos['js'] = "";
		$datos['contenido'] = "definicion";
		$this->load->view('plantillas/plantilla', $datos);	
	}

	function _validar_session(){
		if(!$this->session->userdata('codigo')){
			redirect(base_url().'ingresar');
		}
	}

}
