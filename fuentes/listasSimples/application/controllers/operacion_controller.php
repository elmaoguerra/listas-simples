<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdminoperacionController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('operacion_model'); 
	} 
	 
	public function index() 
	{ 
		$datos['tituloCon'] = 'operacion'; 
		 
		//consultar operacion 
		$data = $this->operacion_model->consultaroperacion(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listaroperacion',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function insertar() 
	{ 
		$datos['tituloCon'] = 'Registrar operacion'; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodoperacion','',true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function insertarAcc() 
	{ 
		 
		     $datos['id']= $this->input->post('txtid');
     $datos['name']= $this->input->post('txtname');
     $datos['descripcion']= $this->input->post('txtdescripcion');
 
		 
		$this->operacion_model->crearoperacion($datos); 
		 
		$datos['notificacion'] = 'Se creo el operacion exitosamente'; 
		 
		$datos['tituloCon'] = 'operacion'; 
		 
		//consultar operacion 
		$data = $this->operacion_model->consultaroperacion(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listaroperacion',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function actualizar() 
	{ 
		$datos['tituloCon'] = 'Actualizar operacion'; 
		 
		$id = $this->uri->segment(3); 
		$objectAct = $this->operacion_model->consultaroperacionById($id); 
		 
		FUNCION_ACTUALIZAR_TABLA 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodoperacion',$objectAct,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function actualizarAcc() 
	{ 
		     $datosActualizar['id']= $this->input->post('txtid');
     $datosActualizar['name']= $this->input->post('txtname');
     $datosActualizar['descripcion']= $this->input->post('txtdescripcion');
 
		 
		$this->operacion_model->actualizaroperacion(LLAVE,$datosActualizar); 
			 
		$datos['notificacion'] = 'Se Actualizo el operacion exitosamente'; 
		 
		$datos['tituloCon'] = 'operacion'; 
		 
		//consultar operacion 
		$data = $this->operacion_model->consultaroperacion(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listaroperacion',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		$objectDel = $this->operacion_model->consultaroperacionById($id); 
		 
		if($objectDel!=false) 
		{ 
			foreach ($objectDel->result() as $row){ 
				 
				$datos['notificacion'] ='   Se Elimino el operacion exitosamente'; 
				//se elimina el operacion 
				$this->operacion_model->eliminaroperacion($row->LLAVE); 
				 
			}	 
		} 
		 
		$datos['tituloCon'] = 'operacion'; 
		 
		//consultar operacion 
		$data = $this->operacion_model->consultaroperacion(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listaroperacion',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function listar() 
	{ 
		$datos['tituloCon'] = 'operacion'; 
		$datos['contenidoInt'] = $this->load->view('administracion/listaroperacion','',true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
} 
