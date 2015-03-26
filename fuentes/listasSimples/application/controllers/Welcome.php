<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('ejercicio_model'); 
		$this->load->model('sentencia_model'); 
		$this->load->model('operacion_model'); 
		
	} 

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$id = 9;
		//carga de ejercicio
		$objectAct = $this->ejercicio_model->consultarejercicioById($id); 
		if($objectAct!=false){ 
							 
			foreach ($objectAct->result() as $row) 
			{
				 //$datos['id'] =	$row->id; 
				 $datos['enunciado']= $row->enunciado;
				 $datos['lista']= $row->lista_inicial;
				 $datos['operacionSel'] = $row->operacion_id;
			}
		}

		//carga de sentencias
		
		$codigoAct ="";
		$sentencias = $this->sentencia_model->consultarsentenciaByEjercicio($id); 
		
		if($sentencias!=false){ 
			foreach ($sentencias->result() as $row) 
			{	
				$codigoAct=$codigoAct.$row->instruccion;
			}
		}
		
		$datos['lineas'] = $codigoAct;

		//$lista="a, b, c, d";
		//$datos['lista']="A,b,c,d";
		$this->load->view('menu', $datos);
		
		 //log_message('debug', 'JJOC prueba log');
		
	}

	public function actualizar() 
	{ 
		
		//secargan las operaciones
		$datosObj['operacionesAsoc'] = $this->operacion_model->consultaroperacion(); 
		
		
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodejercicio',$datosObj,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
}
