<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdminmetaController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('meta_model'); 
	} 
	 
	public function index() 
	{ 
		$datos['tituloCon'] = 'meta'; 
		 
		//consultar meta 
		$data = $this->meta_model->consultarmeta(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarmeta',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function insertar() 
	{ 
		$datos['tituloCon'] = 'Registrar meta'; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodmeta','',true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function insertarAcc() 
	{ 
		 
		     $datos['id']= $this->input->post('txtid');
     $datos['nombre']= $this->input->post('txtnombre');
     $datos['metacol']= $this->input->post('txtmetacol');
 
		 
		$this->meta_model->crearmeta($datos); 
		 
		$datos['notificacion'] = 'Se creo el meta exitosamente'; 
		 
		$datos['tituloCon'] = 'meta'; 
		 
		//consultar meta 
		$data = $this->meta_model->consultarmeta(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarmeta',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function actualizar() 
	{ 
		$datos['tituloCon'] = 'Actualizar meta'; 
		 
		$id = $this->uri->segment(3); 
		$objectAct = $this->meta_model->consultarmetaById($id); 
		 
		FUNCION_ACTUALIZAR_TABLA 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodmeta',$objectAct,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function actualizarAcc() 
	{ 
		     $datosActualizar['id']= $this->input->post('txtid');
     $datosActualizar['nombre']= $this->input->post('txtnombre');
     $datosActualizar['metacol']= $this->input->post('txtmetacol');
 
		 
		$this->meta_model->actualizarmeta(LLAVE,$datosActualizar); 
			 
		$datos['notificacion'] = 'Se Actualizo el meta exitosamente'; 
		 
		$datos['tituloCon'] = 'meta'; 
		 
		//consultar meta 
		$data = $this->meta_model->consultarmeta(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarmeta',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		$objectDel = $this->meta_model->consultarmetaById($id); 
		 
		if($objectDel!=false) 
		{ 
			foreach ($objectDel->result() as $row){ 
				 
				$datos['notificacion'] ='   Se Elimino el meta exitosamente'; 
				//se elimina el meta 
				$this->meta_model->eliminarmeta($row->LLAVE); 
				 
			}	 
		} 
		 
		$datos['tituloCon'] = 'meta'; 
		 
		//consultar meta 
		$data = $this->meta_model->consultarmeta(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarmeta',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function listar() 
	{ 
		$datos['tituloCon'] = 'meta'; 
		$datos['contenidoInt'] = $this->load->view('administracion/listarmeta','',true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
} 
