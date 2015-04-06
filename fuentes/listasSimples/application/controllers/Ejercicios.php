<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejercicios extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('ejercicio_model'); 
		$this->load->model('sentencia_model'); 
		$this->load->model('operacion_model');
	}

	public function index($id = '', $sentencias ='')
	{	
		if($id !== ''){
			$objectAct = $this->ejercicio_model->consultarejercicioById($id);
			if($objectAct !== FALSE){ 
				$ejercicio = $objectAct->row();
			}else{
				$ejercicio = $this->_ejercicio_aleatorio();
			}
		}else{
			$ejercicio = $this->_ejercicio_aleatorio();
		}
		if($ejercicio !== FALSE) { 
			 $datos['id_ejercicio'] = $ejercicio->id; 
			 $datos['enunciado'] = $ejercicio->enunciado;
			 $datos['lista'] = $ejercicio->lista_inicial;
			 $datos['operacionSel'] = $ejercicio->operacion_id;
		}
		
		//carga de sentencias
		$aux;
		if($sentencias === ''){
			$codigoAct ="";
			$sentencias = $this->sentencia_model->consultarsentenciaByEjercicio($ejercicio->id); 
			
			if($sentencias!=false){ 
				foreach ($sentencias->result() as $row) 
				{	
					$codigoAct=$codigoAct.$row->instruccion;
				}
			}
			$aux = explode("\n", $codigoAct);
			//shuffle($aux);
			$this->session->set_flashdata('intentos', 1);
			$this->session->keep_flashdata('intentos');
		}else{
			$aux = $sentencias;
		}

		$datos['titulo'] = "Ejercicios";
		$datos['sentencias'] = $aux;
		$datos['total_ejercicios'] = 5;
		$datos['num_ejercicio'] = 1;
		
		$datos['js'] = 	"<script type=\"text/javascript\" src=\"".base_url()."js/animacion/jquery-2.1.3.min.js\"></script>".
						"<script type=\"text/javascript\" src=\"".base_url()."js/animacion/jquery-ui.min.js\"></script>".
						"<script>\$(function() {\$( \"#pseudo-codigo\" ).sortable({placeholder: \"ui-state-highlight\"});
							\$( \"#pseudo-codigo\" ).disableSelection();});</script>";
		$datos['contenido'] = "ejercicios";
		

		$this->load->view('plantillas/plantilla', $datos);
	}

	function _validar()
	{
		$codigo=$this->security->xss_clean($this->input->post('sentencias[]'));
		$id=$this->security->xss_clean($this->input->post('ejercicio'));

		//carga de sentencias		
		$codigoBD="";
		$sentencias = $this->sentencia_model->consultarsentenciaByEjercicio($id); 
		if($sentencias!=false){ 
			foreach ($sentencias->result() as $row) 
			{	
				$codigoBD=$codigoBD.$row->instruccion;
			}
		}
		$aux=explode("\n", $codigoBD);
		$codigoBD="";
		foreach ($aux as $rowS){
			$codigoBD=$codigoBD.trim($rowS);
		}
		// echo "Cadena Original\n";
		// var_dump($codigoBD);//83
		$codigoUsuario="";
		foreach ($codigo as $row) 
		{	
			$codigoUsuario=$codigoUsuario.(trim($row));
		}
		// echo "\nCadena Enviada\n";
		// var_dump($codigoUsuario);//83

		if($codigoBD === $codigoUsuario){
			echo "son Iguales";
			return TRUE;
		}else{
			echo "son Diferentes";
			$datos = array(
				'id' => $id,
				'codigo' =>$codigo
				);
			return $datos;
		}
	}

	public function enviar()
	{
		$valida = $this->_validar();
		if($valida === TRUE){
			//Guardar_BD
			//Cargar otro ejercicio

			$this->index();
		}else{
			//Volver a cargar el ejercicio
			$this->session->set_flashdata('intentos', $this->session->flashdata('intentos')+1);
			$this->index($valida['id'], $valida['codigo']);
		}
	}

	function fechas(){

		$val1 = '22:30:05.900';
		$val2 = '22:30:55.100';

		$dateTime1 = new DateTime($val1);
		$dateTime2 = new DateTime($val2);
		$inter = $dateTime1->diff($dateTime2);
		echo "<pre>";
		var_dump($inter);

		echo $inter->format("%i minutos");
	}

	function _ejercicio_aleatorio()
	{
		$objectAct = $this->ejercicio_model->consultarejercicio();
		if ($objectAct !== FALSE) {
			$n = mt_rand(0, count($objectAct));
			$objectAct = $objectAct->result();
			$ejercicio = $objectAct[$n];
			return $ejercicio;
		}
		return FALSE;
	}
}

//void recorrer(Nodo *ptrLista) {while (ptrLista != NULL){ptrLista = ptrLista->sig;}}