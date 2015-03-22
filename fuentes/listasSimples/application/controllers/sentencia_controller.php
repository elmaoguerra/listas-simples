<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdminsentenciaController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('sentencia_model'); 
	} 
	 
	public function index() 
	{ 
		$datos['tituloCon'] = 'sentencia'; 
		 
		//consultar sentencia 
		$data = $this->sentencia_model->consultarsentencia(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarsentencia',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function insertar() 
	{ 
		$datos['tituloCon'] = 'Registrar sentencia'; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodsentencia','',true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function insertarAcc() 
	{ 
		 
	 $datos['id']= $this->input->post('txtid');
     $datos['instruccion']= $this->input->post('txtinstruccion');
     $datos['ejercicio_id']= $this->input->post('txtejercicio_id');
 
		 
		$this->sentencia_model->crearsentencia($datos); 
		 
		$datos['notificacion'] = 'Se creo el sentencia exitosamente'; 
		 
		$datos['tituloCon'] = 'sentencia'; 
		 
		//consultar sentencia 
		$data = $this->sentencia_model->consultarsentencia(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarsentencia',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function actualizar() 
	{ 
		$datos['tituloCon'] = 'Actualizar sentencia'; 
		 
		$id = $this->uri->segment(3); 
		$objectAct = $this->sentencia_model->consultarsentenciaById($id); 
		 
		FUNCION_ACTUALIZAR_TABLA 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodsentencia',$objectAct,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function actualizarAcc() 
	{ 
		     $datosActualizar['id']= $this->input->post('txtid');
     $datosActualizar['instruccion']= $this->input->post('txtinstruccion');
     $datosActualizar['ejercicio_id']= $this->input->post('txtejercicio_id');
 
		 
		$this->sentencia_model->actualizarsentencia(LLAVE,$datosActualizar); 
			 
		$datos['notificacion'] = 'Se Actualizo el sentencia exitosamente'; 
		 
		$datos['tituloCon'] = 'sentencia'; 
		 
		//consultar sentencia 
		$data = $this->sentencia_model->consultarsentencia(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarsentencia',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		$objectDel = $this->sentencia_model->consultarsentenciaById($id); 
		 
		if($objectDel!=false) 
		{ 
			foreach ($objectDel->result() as $row){ 
				 
				$datos['notificacion'] ='   Se Elimino el sentencia exitosamente'; 
				//se elimina el sentencia 
				$this->sentencia_model->eliminarsentencia($row->LLAVE); 
				 
			}	 
		} 
		 
		$datos['tituloCon'] = 'sentencia'; 
		 
		//consultar sentencia 
		$data = $this->sentencia_model->consultarsentencia(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarsentencia',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function listar() 
	{ 
		$datos['tituloCon'] = 'sentencia'; 
		$datos['contenidoInt'] = $this->load->view('administracion/listarsentencia','',true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
} 

