<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdminusuarioController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('usuario_model'); 
	} 
	 
	public function index() 
	{ 
		$datos['tituloCon'] = 'Usuarios'; 
		 
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
     $datos['password']= md5($this->input->post('txtpassword1'));
     $datos['grupo_id']= $this->input->post('txtgrupo_id');
 
	$this->usuario_model->crearusuario($datos); 
	
	$datos['notificacion'] = 'Se creo el usuario exitosamente'; 
	
	$datos['tituloCon'] = 'Usuarios'; 
	
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
		 
		if($objectAct!=false){ 
							 
			foreach ($objectAct->result() as $row) 
			{
				 $datosObj['codigo'] =	$row->codigo; 
				 $datosObj['nombre']= $row->nombre;
				 $datosObj['email']= $row->email;
				 $datosObj['grupo_id']= $row->grupo_id;
				 $datosObj['conexion']= $row->conexion;
												 				
			}
		}
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodusuario',$datosObj,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function actualizarAcc() 
	{ 
		 $datosActualizar['codigo']= $this->input->post('txtcodigo');
		 $datosActualizar['nombre']= $this->input->post('txtnombre');
		 $datosActualizar['email']= $this->input->post('txtemail');
		 
		 $passwordAct="";
		 
		 if($this->input->post('txtpassword1')==""){
			$usuarioActGet = $this->usuario_model->consultarusuarioById($datosActualizar['codigo']); 
			if($usuarioActGet!=false){ 
								 
				foreach ($usuarioActGet->result() as $row) 
				{
					 $passwordAct =	$row->password; 
				}
			}
		 }else{
			$passwordAct = md5($this->input->post('txtpassword1'));
		 }
		 
		 $datosActualizar['password'] = $passwordAct;
		 $datosActualizar['conexion']= $this->input->post('txtconexion');
		 $datosActualizar['grupo_id']= $this->input->post('txtgrupo_id');
 
		$this->usuario_model->actualizarusuario($datosActualizar['codigo'],$datosActualizar); 
			 
		$datos['notificacion'] = 'Se Actualizo el usuario exitosamente'; 
		 
		$datos['tituloCon'] = 'Usuarios'; 
		 
		//consultar usuario 
		$data = $this->usuario_model->consultarusuario(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarusuario',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		$this->usuario_model->eliminarusuario($id); 
		 
		$datos['tituloCon'] = 'Usuarios'; 
		 
		//consultar usuario 
		$data = $this->usuario_model->consultarusuario(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarusuario',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function listar() 
	{ 
		$datos['tituloCon'] = 'Usuarios'; 
		$datos['contenidoInt'] = $this->load->view('administracion/listarusuario','',true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
} 

