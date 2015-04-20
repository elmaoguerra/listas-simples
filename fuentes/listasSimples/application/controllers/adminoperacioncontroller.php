<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdminoperacionController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('operacion_model'); 
		
		//carga helper perfiles
		$this->load->helper('perfiles');

		
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
		 
		$datos['name']= $this->input->post('txtname');
		$datos['descripcion']= $this->input->post('txtdescripcion');

		$this->operacion_model->crearoperacion($datos); 
		 
		$datos['notificacion'] = 'Se creo la operacion exitosamente'; 
		 
		$datos['tituloCon'] = 'Operaciones'; 
		 
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
		
		if($objectAct!=false){ 
							 
			foreach ($objectAct->result() as $row) 
			{
				 $datosObj['id'] =	$row->id; 
				 $datosObj['name']= $row->name;
				 $datosObj['descripcion']= $row->descripcion;
			}
		}
		
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodoperacion',$datosObj,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function actualizarAcc() 
	{ 
		$datosActualizar['id']= $this->input->post('txtid');
		$datosActualizar['name']= $this->input->post('txtname');
		$datosActualizar['descripcion']= $this->input->post('txtdescripcion');
 
		$this->operacion_model->actualizaroperacion($datosActualizar['id'],$datosActualizar); 
			 
		$datos['notificacion'] = 'Se Actualizo la operacion exitosamente'; 
		 
		$datos['tituloCon'] = 'Operaciones'; 
		 
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
		
		//se elimina el operacion 
		$this->operacion_model->eliminaroperacion($id); 
		$datos['notificacion'] ='   Se Elimino el operacion exitosamente'; 
		 
		$datos['tituloCon'] = 'Operaciones'; 
		 
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

