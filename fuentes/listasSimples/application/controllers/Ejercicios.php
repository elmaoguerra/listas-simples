<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejercicios extends CI_Controller {
	function __construct(){ 
		parent::__construct(); 
		$this->load->model('ejercicio_model'); 
		$this->load->model('sentencia_model'); 
		$this->load->model('operacion_model'); 
	}

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

		$aux=explode("\r\n", $codigoAct);
		$datos['titulo'] = "Modificación en una lista";
		$datos['lineas'] = $codigoAct;
		$datos['sentencias'] = $aux;
		
		$datos['js'] = 	"<script type=\"text/javascript\" src=\"".base_url()."js/animacion/jquery-2.1.3.min.js\"></script>".
						"<script type=\"text/javascript\" src=\"".base_url()."js/animacion/jquery-ui.min.js\"></script>".
						"<script>\$(function() {\$( \"#pseudo-codigo\" ).sortable({placeholder: \"ui-state-highlight\"});
							\$( \"#pseudo-codigo\" ).disableSelection();});</script>";
		$datos['contenido'] = "ejercicios";

		$this->load->view('plantillas/plantilla', $datos);
	}

	function enviar()
	{
		$a=$this->input->post();
		var_dump($a);

	}
}