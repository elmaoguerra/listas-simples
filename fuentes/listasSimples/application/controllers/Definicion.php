<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Definicion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('LoginModel', 'acceso');
		$this->acceso->_validar_sesion();
		
		//carga helper perfiles
		$this->load->helper('perfiles');
	}

	public function index()
	{	
		$datos['titulo'] = "Definición";
		$datos['js'] = "";
		//$datos['contenido'] = "definicion";
		$datos['contenido']= $this->load->view('definicion',"",true);	
		$this->load->view('plantillas/plantilla', $datos);	
	}
}
