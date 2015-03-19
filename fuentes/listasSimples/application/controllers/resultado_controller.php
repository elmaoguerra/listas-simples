<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdminresultadoController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('resultado_model'); 
	} 
	 
	public function index() 
	{ 
		$datos['tituloCon'] = 'resultado'; 
		 
		//consultar resultado 
		$data = $this->resultado_model->consultarresultado(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarresultado',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function insertar() 
	{ 
		$datos['tituloCon'] = 'Registrar resultado'; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodresultado','',true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function insertarAcc() 
	{ 
		 
		     $datos['ejercicio_id']= $this->input->post('txtejercicio_id');
     $datos['usuario']= $this->input->post('txtusuario');
     $datos['tiempo']= $this->input->post('txttiempo');
     $datos['eficiencia']= $this->input->post('txteficiencia');
     $datos['fecha']= $this->input->post('txtfecha');
 
		 
		$this->resultado_model->crearresultado($datos); 
		 
		$datos['notificacion'] = 'Se creo el resultado exitosamente'; 
		 
		$datos['tituloCon'] = 'resultado'; 
		 
		//consultar resultado 
		$data = $this->resultado_model->consultarresultado(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarresultado',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function actualizar() 
	{ 
		$datos['tituloCon'] = 'Actualizar resultado'; 
		 
		$id = $this->uri->segment(3); 
		$objectAct = $this->resultado_model->consultarresultadoById($id); 
		 
		FUNCION_ACTUALIZAR_TABLA 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodresultado',$objectAct,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function actualizarAcc() 
	{ 
		     $datosActualizar['ejercicio_id']= $this->input->post('txtejercicio_id');
     $datosActualizar['usuario']= $this->input->post('txtusuario');
     $datosActualizar['tiempo']= $this->input->post('txttiempo');
     $datosActualizar['eficiencia']= $this->input->post('txteficiencia');
     $datosActualizar['fecha']= $this->input->post('txtfecha');
 
		 
		$this->resultado_model->actualizarresultado(LLAVE,$datosActualizar); 
			 
		$datos['notificacion'] = 'Se Actualizo el resultado exitosamente'; 
		 
		$datos['tituloCon'] = 'resultado'; 
		 
		//consultar resultado 
		$data = $this->resultado_model->consultarresultado(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarresultado',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		$objectDel = $this->resultado_model->consultarresultadoById($id); 
		 
		if($objectDel!=false) 
		{ 
			foreach ($objectDel->result() as $row){ 
				 
				$datos['notificacion'] ='   Se Elimino el resultado exitosamente'; 
				//se elimina el resultado 
				$this->resultado_model->eliminarresultado($row->LLAVE); 
				 
			}	 
		} 
		 
		$datos['tituloCon'] = 'resultado'; 
		 
		//consultar resultado 
		$data = $this->resultado_model->consultarresultado(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarresultado',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function listar() 
	{ 
		$datos['tituloCon'] = 'resultado'; 
		$datos['contenidoInt'] = $this->load->view('administracion/listarresultado','',true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
} 
