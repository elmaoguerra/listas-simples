<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdminejercicioController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('ejercicio_model'); 
		//carga helper perfiles
		$this->load->helper('perfiles');
	} 

	public function index() 
	{ 
		$datos['tituloCon'] = 'ejercicio'; 
		 
		//consultar ejercicio 
		$data = $this->ejercicio_model->consultarejercicio(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarejercicio',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function insertar() 
	{ 
		$datos['tituloCon'] = 'Registrar ejercicio'; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodejercicio','',true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function insertarAcc() 
	{ 
		 
$datos['id']= $this->input->post('txtid');
     $datos['enunciado']= $this->input->post('txtenunciado');
     $datos['lista_inicial']= $this->input->post('txtlista_inicial');
     $datos['solucion']= $this->input->post('txtsolucion');
     $datos['operacion_id']= $this->input->post('txtoperacion_id');
 
		 
		$this->ejercicio_model->crearejercicio($datos); 
		 
		$datos['notificacion'] = 'Se creo el ejercicio exitosamente'; 
		 
		$datos['tituloCon'] = 'ejercicio'; 
		 
		//consultar ejercicio 
		$data = $this->ejercicio_model->consultarejercicio(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarejercicio',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function actualizar() 
	{ 
		$datos['tituloCon'] = 'Actualizar ejercicio'; 
		 
		$id = $this->uri->segment(3); 
		$objectAct = $this->ejercicio_model->consultarejercicioById($id); 
		 
		FUNCION_ACTUALIZAR_TABLA 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/insertmodejercicio',$objectAct,true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function actualizarAcc() 
	{ 
		     $datosActualizar['id']= $this->input->post('txtid');
     $datosActualizar['enunciado']= $this->input->post('txtenunciado');
     $datosActualizar['lista_inicial']= $this->input->post('txtlista_inicial');
     $datosActualizar['solucion']= $this->input->post('txtsolucion');
     $datosActualizar['operacion_id']= $this->input->post('txtoperacion_id');
 
		 
		$this->ejercicio_model->actualizarejercicio(LLAVE,$datosActualizar); 
			 
		$datos['notificacion'] = 'Se Actualizo el ejercicio exitosamente'; 
		 
		$datos['tituloCon'] = 'ejercicio'; 
		 
		//consultar ejercicio 
		$data = $this->ejercicio_model->consultarejercicio(); 
		$datosContenido['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarejercicio',$datosContenido,true);			 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		$objectDel = $this->ejercicio_model->consultarejercicioById($id); 
		 
		if($objectDel!=false) 
		{ 
			foreach ($objectDel->result() as $row){ 
				 
				$datos['notificacion'] ='   Se Elimino el ejercicio exitosamente'; 
				//se elimina el ejercicio 
				$this->ejercicio_model->eliminarejercicio($row->LLAVE); 
				 
			}	 
		} 
		 
		$datos['tituloCon'] = 'ejercicio'; 
		 
		//consultar ejercicio 
		$data = $this->ejercicio_model->consultarejercicio(); 
		$datosC['data']= $data; 
		 
		$datos['contenidoInt'] = $this->load->view('administracion/listarejercicio',$datosC,true);		 
		$this->load->view('administracion/contenido',$datos); 
		 
	} 
	 
	public function listar() 
	{ 
		$datos['tituloCon'] = 'ejercicio'; 
		$datos['contenidoInt'] = $this->load->view('administracion/listarejercicio','',true);		 
		$this->load->view('administracion/contenido',$datos); 
	} 
	 
} 

