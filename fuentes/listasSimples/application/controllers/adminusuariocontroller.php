<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdminusuarioController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('usuario_model'); 
		//carga helper perfiles
		$this->load->helper('perfiles');

	} 
	 
	public function index() 
	{ 
	
		$datos['titulo'] = 'Usuarios';  
		 
		//consultar usuario 
		$data = $this->usuario_model->consultarusuario(); 
		$datosC['data']= $data; 
		$datos['js'] = "";
		$datos['contenido'] = $this->load->view('administracion/listarusuario',$datosC,true);		 
		$this->load->view('plantillas/plantilla', $datos); 
	} 
	 
	public function insertar() 
	{ 
		$datos['titulo'] = 'Registrar usuario'; 
		$datos['js'] = "";
		$datos['contenido'] = $this->load->view('administracion/insertmodusuario','',true);		 
		$this->load->view('plantillas/plantilla', $datos); 
	} 
	 
	public function insertarAcc() 
	{ 
	 $code = rand(1000, 99999);
	 $datos['codigo']= $this->input->post('txtcodigo');
     $datos['nombre']= $this->input->post('txtnombre');
     $datos['email']= $this->input->post('txtemail');
     $datos['password']= md5($this->input->post('txtpassword1'));
     $datos['grupo_id']= $this->input->post('txtgrupo_id');
     $datos['cod_activacion']=$code;
 
	$this->usuario_model->crearusuario($datos); 
	
	$datos['notificacion'] = 'Se creo el usuario exitosamente'; 
	

	//Enviar correo
		
	$this->load->model('MailModel');
	$variable = $this->MailModel->enviar($datos);
	if($variable == true){
			echo 'mensaje enviado';
		}else{
			echo 'no se envio el mensaje';
		}

	$datos['titulo'] = 'Usuarios'; 
	$datos['js'] = "";
	
	//consultar usuario 
	$data = $this->usuario_model->consultarusuario(); 
	$datosContenido['data']= $data; 
	
	$datos['contenido'] = $this->load->view('administracion/listarusuario',$datosContenido,true);			 
	$this->load->view('plantillas/plantilla', $datos); 
		 
	} 
	 
	public function actualizar() 
	{ 
		$datos['titulo'] = 'Actualizar usuario'; 
		 
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
		
		$datos['js'] = "";
		$datos['contenido'] = $this->load->view('administracion/insertmodusuario',$datosObj,true);		 
		$this->load->view('plantillas/plantilla', $datos); 
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
		 
		$datos['titulo'] = 'Usuarios'; 
		 
		//consultar usuario 
		$data = $this->usuario_model->consultarusuario(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenido'] = $this->load->view('administracion/listarusuario',$datosContenido,true);			 
		$this->load->view('plantillas/plantilla', $datos); 
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		$this->usuario_model->eliminarusuario($id); 
		 
		$datos['titulo'] = 'Usuarios'; 
		 
		//consultar usuario 
		$data = $this->usuario_model->consultarusuario(); 
		$datosC['data']= $data; 
		 
		$datos['contenido'] = $this->load->view('administracion/listarusuario',$datosC,true);		 
		$this->load->view('plantillas/plantilla', $datos); 
		 
	} 
	 
	public function listar() 
	{ 
		$datos['titulo'] = 'Usuarios'; 
		$datos['contenidoInt'] = $this->load->view('administracion/listarusuario','',true);		 
		$this->load->view('plantillas/plantilla', $datos); 
	} 
	 
	 public function confirmar($code)
	 {
	 	//echo 'en controller'.$code;
	 	$res = $this->usuario_model->very($code);
	 	if($res == false)
	 	{
	 		echo 'El usuario no existe';
	 	}else{
	 		$this->usuario_model->actualizarcodigousuario($code);
	 		$this->load->view('confirmacion');
	 		echo 'Usuario Confirmado';
	 	}
	 }
} 

