<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Administracion extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		
		//carga helper perfiles
		$this->load->helper('perfiles');

		
	} 
	 
	public function index() 
	{ 	
		$datos['titulo'] = "Ejercicios";
		$datos['js'] = "";
		//$datos['contenido'] = "definicion";
		$datos['contenido']= $this->load->view('administracion/panelAdministracion',"",true);	
		$this->load->view('plantillas/plantilla', $datos);	
		
	} 
	 
} 

