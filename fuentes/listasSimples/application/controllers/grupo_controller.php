<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdmingrupoController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('grupo_model'); 
	} 
	 
	public function index() 
	{ 
		$datos['tituloCon'] = 'grupo'; 
		 
		//consultar grupo 
		$data = $this->grupo_model->consultargrupo(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listargrupo',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function insertar() 
	{ 
		$datos['tituloCon'] = 'Registrar grupo'; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodgrupo','',true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function insertarAcc() 
	{ 
		 
		     $datos['id']= $this->input->post('txtid');
     $datos['nombre']= $this->input->post('txtnombre');
     $datos['metas']= $this->input->post('txtmetas');
     $datos['autoreflexion']= $this->input->post('txtautoreflexion');
 
		 
		$this->grupo_model->creargrupo($datos); 
		 
		$datos['notificacion'] = 'Se creo el grupo exitosamente'; 
		 
		$datos['tituloCon'] = 'grupo'; 
		 
		//consultar grupo 
		$data = $this->grupo_model->consultargrupo(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listargrupo',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function actualizar() 
	{ 
		$datos['tituloCon'] = 'Actualizar grupo'; 
		 
		$id = $this->uri->segment(3); 
		$objectAct = $this->grupo_model->consultargrupoById($id); 
		 
		FUNCION_ACTUALIZAR_TABLA 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodgrupo',$objectAct,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function actualizarAcc() 
	{ 
		     $datosActualizar['id']= $this->input->post('txtid');
     $datosActualizar['nombre']= $this->input->post('txtnombre');
     $datosActualizar['metas']= $this->input->post('txtmetas');
     $datosActualizar['autoreflexion']= $this->input->post('txtautoreflexion');
 
		 
		$this->grupo_model->actualizargrupo(LLAVE,$datosActualizar); 
			 
		$datos['notificacion'] = 'Se Actualizo el grupo exitosamente'; 
		 
		$datos['tituloCon'] = 'grupo'; 
		 
		//consultar grupo 
		$data = $this->grupo_model->consultargrupo(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listargrupo',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		$objectDel = $this->grupo_model->consultargrupoById($id); 
		 
		if($objectDel!=false) 
		{ 
			foreach ($objectDel->result() as $row){ 
				 
				$datos['notificacion'] ='   Se Elimino el grupo exitosamente'; 
				//se elimina el grupo 
				$this->grupo_model->eliminargrupo($row->LLAVE); 
				 
			}	 
		} 
		 
		$datos['tituloCon'] = 'grupo'; 
		 
		//consultar grupo 
		$data = $this->grupo_model->consultargrupo(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listargrupo',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function listar() 
	{ 
		$datos['tituloCon'] = 'grupo'; 
		$datos['contenidoInt'] = $this->load->view('administracion/listargrupo','',true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
} 
