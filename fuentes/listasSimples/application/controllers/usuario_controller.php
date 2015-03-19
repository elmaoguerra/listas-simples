<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdminusuarioController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('usuario_model'); 
	} 
	 
	public function index() 
	{ 
		$datos['tituloCon'] = 'usuario'; 
		 
		//consultar usuario 
		$data = $this->usuario_model->consultarusuario(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarusuario',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function insertar() 
	{ 
		$datos['tituloCon'] = 'Registrar usuario'; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodusuario','',true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function insertarAcc() 
	{ 
		 
		     $datos['codigo']= $this->input->post('txtcodigo');
     $datos['nombre']= $this->input->post('txtnombre');
     $datos['email']= $this->input->post('txtemail');
     $datos['password']= $this->input->post('txtpassword');
     $datos['conexion']= $this->input->post('txtconexion');
     $datos['grupo_id']= $this->input->post('txtgrupo_id');
 
		 
		$this->usuario_model->crearusuario($datos); 
		 
		$datos['notificacion'] = 'Se creo el usuario exitosamente'; 
		 
		$datos['tituloCon'] = 'usuario'; 
		 
		//consultar usuario 
		$data = $this->usuario_model->consultarusuario(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarusuario',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function actualizar() 
	{ 
		$datos['tituloCon'] = 'Actualizar usuario'; 
		 
		$id = $this->uri->segment(3); 
		$objectAct = $this->usuario_model->consultarusuarioById($id); 
		 
		FUNCION_ACTUALIZAR_TABLA 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodusuario',$objectAct,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function actualizarAcc() 
	{ 
		     $datosActualizar['codigo']= $this->input->post('txtcodigo');
     $datosActualizar['nombre']= $this->input->post('txtnombre');
     $datosActualizar['email']= $this->input->post('txtemail');
     $datosActualizar['password']= $this->input->post('txtpassword');
     $datosActualizar['conexion']= $this->input->post('txtconexion');
     $datosActualizar['grupo_id']= $this->input->post('txtgrupo_id');
 
		 
		$this->usuario_model->actualizarusuario(LLAVE,$datosActualizar); 
			 
		$datos['notificacion'] = 'Se Actualizo el usuario exitosamente'; 
		 
		$datos['tituloCon'] = 'usuario'; 
		 
		//consultar usuario 
		$data = $this->usuario_model->consultarusuario(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarusuario',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		$objectDel = $this->usuario_model->consultarusuarioById($id); 
		 
		if($objectDel!=false) 
		{ 
			foreach ($objectDel->result() as $row){ 
				 
				$datos['notificacion'] ='   Se Elimino el usuario exitosamente'; 
				//se elimina el usuario 
				$this->usuario_model->eliminarusuario($row->LLAVE); 
				 
			}	 
		} 
		 
		$datos['tituloCon'] = 'usuario'; 
		 
		//consultar usuario 
		$data = $this->usuario_model->consultarusuario(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarusuario',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function listar() 
	{ 
		$datos['tituloCon'] = 'usuario'; 
		$datos['contenidoInt'] = $this->load->view('administracion/listarusuario','',true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
} 
