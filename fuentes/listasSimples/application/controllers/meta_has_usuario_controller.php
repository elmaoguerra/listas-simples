<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Adminmeta_has_usuarioController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('meta_has_usuario_model'); 
		
		//carga helper perfiles
		$this->load->helper('perfiles');
	} 
	 
	public function index() 
	{ 
		$datos['tituloCon'] = 'meta_has_usuario'; 
		 
		//consultar meta_has_usuario 
		$data = $this->meta_has_usuario_model->consultarmeta_has_usuario(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarmeta_has_usuario',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function insertar() 
	{ 
		$datos['tituloCon'] = 'Registrar meta_has_usuario'; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodmeta_has_usuario','',true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function insertarAcc() 
	{ 
		 
		     $datos['meta_id']= $this->input->post('txtmeta_id');
     $datos['usuario_codigo']= $this->input->post('txtusuario_codigo');
     $datos['usuario_grupo_id']= $this->input->post('txtusuario_grupo_id');
     $datos['tiempo']= $this->input->post('txttiempo');
     $datos['eficiencia']= $this->input->post('txteficiencia');
     $datos['fecha']= $this->input->post('txtfecha');
 
		 
		$this->meta_has_usuario_model->crearmeta_has_usuario($datos); 
		 
		$datos['notificacion'] = 'Se creo el meta_has_usuario exitosamente'; 
		 
		$datos['tituloCon'] = 'meta_has_usuario'; 
		 
		//consultar meta_has_usuario 
		$data = $this->meta_has_usuario_model->consultarmeta_has_usuario(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarmeta_has_usuario',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function actualizar() 
	{ 
		$datos['tituloCon'] = 'Actualizar meta_has_usuario'; 
		 
		$id = $this->uri->segment(3); 
		$objectAct = $this->meta_has_usuario_model->consultarmeta_has_usuarioById($id); 
		 
		FUNCION_ACTUALIZAR_TABLA 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodmeta_has_usuario',$objectAct,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function actualizarAcc() 
	{ 
		     $datosActualizar['meta_id']= $this->input->post('txtmeta_id');
     $datosActualizar['usuario_codigo']= $this->input->post('txtusuario_codigo');
     $datosActualizar['usuario_grupo_id']= $this->input->post('txtusuario_grupo_id');
     $datosActualizar['tiempo']= $this->input->post('txttiempo');
     $datosActualizar['eficiencia']= $this->input->post('txteficiencia');
     $datosActualizar['fecha']= $this->input->post('txtfecha');
 
		 
		$this->meta_has_usuario_model->actualizarmeta_has_usuario(LLAVE,$datosActualizar); 
			 
		$datos['notificacion'] = 'Se Actualizo el meta_has_usuario exitosamente'; 
		 
		$datos['tituloCon'] = 'meta_has_usuario'; 
		 
		//consultar meta_has_usuario 
		$data = $this->meta_has_usuario_model->consultarmeta_has_usuario(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarmeta_has_usuario',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		$objectDel = $this->meta_has_usuario_model->consultarmeta_has_usuarioById($id); 
		 
		if($objectDel!=false) 
		{ 
			foreach ($objectDel->result() as $row){ 
				 
				$datos['notificacion'] ='   Se Elimino el meta_has_usuario exitosamente'; 
				//se elimina el meta_has_usuario 
				$this->meta_has_usuario_model->eliminarmeta_has_usuario($row->LLAVE); 
				 
			}	 
		} 
		 
		$datos['tituloCon'] = 'meta_has_usuario'; 
		 
		//consultar meta_has_usuario 
		$data = $this->meta_has_usuario_model->consultarmeta_has_usuario(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarmeta_has_usuario',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function listar() 
	{ 
		$datos['tituloCon'] = 'meta_has_usuario'; 
		$datos['contenidoInt'] = $this->load->view('administracion/listarmeta_has_usuario','',true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
} 

