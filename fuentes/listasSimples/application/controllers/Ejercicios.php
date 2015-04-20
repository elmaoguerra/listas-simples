<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ejercicios extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		
		//carga helper perfiles
		$this->load->helper('perfiles');
		
		$this->load->model('LoginModel', 'acceso');
		$this->acceso->_validar_sesion();
		$this->_validar_grupo();
		$this->load->model('ejercicio_model'); 
		$this->load->model('sentencia_model'); 
		$this->load->model('operacion_model');
		date_default_timezone_set('America/Bogota');
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
			$datos['repite'] = FALSE;
		}else{
			$aux = $sentencias;
			$datos['repite'] = TRUE;
		}

		$datos['titulo'] = "Ejercicios";
		$datos['sentencias'] = $aux;
		$datos['total_ejercicios'] = 5;
		$datos['num_ejercicio'] = 1;
		
		$datos['js'] = 	"<script type=\"text/javascript\" src=\"".base_url()."js/animacion/jquery-2.1.3.min.js\"></script>".
						"<script type=\"text/javascript\" src=\"".base_url()."js/animacion/jquery-ui.min.js\"></script>".
						"<script>\$(function() {\$( \"#pseudo-codigo\" ).sortable({placeholder: \"ui-state-highlight\"});
							\$( \"#pseudo-codigo\" ).disableSelection();});</script>";
		//$datos['contenido'] = "ejercicios";
		$datos['contenido']= $this->load->view('ejercicios',"",true);	

		$this->load->view('plantillas/plantilla', $datos);
	}

	function _validar()
	{
		$codigo=$this->security->xss_clean($this->input->post('sentencias[]'));
		$id=$this->security->xss_clean($this->input->post('ejercicio'));
		$hora1=$this->security->xss_clean($this->input->post('hora1'));
		$hora2=date('H:i:s');
		$seg = $this->session->flashdata('seg');
		$seg += $this->_tiempos($hora1, $hora2);
		$this->session->set_flashdata('seg', $seg);

		if($codigo=="" || $id==""){
			redirect(base_url().'ejercicios');
		}
		$query = $this->ejercicio_model->consultarNombreOpById($id);
		$nombre_op=$query->row()->name;
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
		$datos = array(
			'id' => $id,
			'codigo' =>$codigo,
			'nombre_op' =>$nombre_op
			);
		if($codigoBD === $codigoUsuario){
			//echo "son Iguales";
			$datos['valido'] = TRUE;
		}else{
			// echo "son Diferentes";
			$datos['valido'] = FALSE;
		}
			return $datos;
	}

	public function error()
	{
		$valida = $this->_validar();
		$intentos = $this->session->flashdata('intentos');
		$this->session->keep_flashdata('intentos');
		if($valida['valido']){
			//Guardar_BD
			$this->load->model('resultado_model');
			$resultado = array('ejercicio_id' => $valida['id'],
				'usuario' => $this->session->userdata('codigo'),
				'tiempo' => $this->session->flashdata('seg'),
				'eficiencia' => $this->_calcular_eficiencia(),
				'fecha' => date("Y-m-d H:i:s"));
			$this->resultado_model->crearresultado($resultado);
			
			//Mensaje BIEN
			redirect(base_url().'ejercicios/bien');
		}else{
			$intentos += 1;
			$this->session->set_flashdata('intentos', $intentos);
			if ($intentos<4) {
				//Volver a cargar el ejercicio
				$this->index($valida['id'], $valida['codigo']);
			}else{
				// 4 intentos
				// Guardar_BD
				// Redirigir
				$op = $this->_definir_op($valida['nombre_op']);

				$datos['titulo'] = "Debes Mejorar";
				$datos['js'] = 	"";
//				$datos['contenido'] = "bien";
				$datos['contenido']= $this->load->view('bien',"",true);
				$datos['tipo'] = "mejorar";
				$datos['enlace'] = $op;
				$this->load->view('plantillas/plantilla', $datos);
			}
		}
	}

	function _tiempos($val1, $val2)
	{
		$dateTime1 = new DateTime($val1);
		$dateTime2 = new DateTime($val2);
		$inter = $dateTime1->diff($dateTime2);

		$seg = ($inter->h * 3600) + ($inter->i * 60) + ($inter->s);
		return $seg;// Devuelve los segundos que empleó el usuario
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

	function bien()
	{
		//Carga solo si se realizo un correcto ejercicio
		if (!$this->session->flashdata('seg')) {
			redirect(base_url());
		}
		$datos['titulo'] = "Bien Hecho";
		$datos['js'] = 	"";
		//				$datos['contenido'] = "bien";
				$datos['contenido']= $this->load->view('bien',"",true);
		$datos['tipo'] = "bien";
		$datos['eficiencia'] = 	$this->_calcular_eficiencia();
		$this->load->view('plantillas/plantilla', $datos);
	}

	function _calcular_eficiencia()
	{
		$intentos = $this->session->flashdata('intentos');
		return round((3*100/$intentos)/3);
	}

	function _definir_op($nombre)
	{
		$nombre = strtolower($nombre);
		if (strpos($nombre, 'recorrer')!==FALSE || strpos($nombre, 'modificar')!==FALSE) {
			return 'operaciones/modificar';
		}elseif (strpos($nombre, 'insertar')!==FALSE) {
			return 'operaciones/insertar';
		}elseif (strpos($nombre, 'eliminar')!==FALSE) {
			return 'operaciones/eliminar';
		}else{
			return 'operaciones';
		}
	}
	// Solo permite el acceso al grupo de solo ejercicios (grupo 1)
	function _validar_grupo()
	{
		if($this->session->userdata('grupo')!= 1){
			redirect(base_url().'definicion');
		}
	}
}