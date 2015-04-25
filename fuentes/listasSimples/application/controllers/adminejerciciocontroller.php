<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class AdminEjercicioController extends CI_Controller { 
 
	function __construct(){ 
		parent::__construct(); 
		
		//carga helper perfiles
		$this->load->helper('perfiles');
		
		$this->load->helper('url');	 
		$this->load->model('ejercicio_model'); 
		$this->load->model('sentencia_model'); 
		$this->load->model('operacion_model'); 
		
	} 
	 
	public function index() 
	{ 
		
		//consultar ejercicio 
		$data = $this->ejercicio_model->consultarejercicio(); 
		$datosC['data']= $data; 
		$datosC['operaciones'] = $this->operacion_model->consultaroperacion(); 
		
		$datos['titulo'] = "Ejercicios";
		$datos['contenido'] = $this->load->view('administracion/listarejercicio',$datosC,true);	
		$this->load->view('plantillas/plantilla', $datos);	
		
	} 
	 
	public function insertar() 
	{ 
		$datos['titulo'] = 'Registrar ejercicio'; 
		
		//secargan las operaciones
		$datosInsert['operacionesAsoc'] = $this->operacion_model->consultaroperacion(); 
		//la operacion seleccionada es 0 ya que se va a insertar
		$datosInsert['operacionSel'] = 0;
		
		$datos['contenido'] = $this->load->view('administracion/insertmodejercicio',$datosInsert,true);	
		 
		$this->load->view('plantillas/plantilla', $datos);
		 
	} 
	 
	public function insertarAcc() 
	{ 
		
	//extraer id mas alto

	 $idInsert = $this->ejercicio_model->getMaxId();	

	 $datos['id'] =	$idInsert; 
     $datos['enunciado']= $this->input->post('txtaEnunciado');
     $datos['lista_inicial']= $this->input->post('txtlista_inicial');
     $datos['operacion_id']= $this->input->post('txtoperacion_id');
	 $this->ejercicio_model->crearejercicio($datos); 
  
     $codigoEjercicio = $this->input->post('txtaLienas');
	 $lineas = explode("\n",$codigoEjercicio);
	
	 $ordenador =1;
	 
	 for($i=0; $i < count($lineas) ; $i += 2){
		 
		//inserta lineas
		$instruccion= $lineas[$i]."\n";
		
		if(($i+1) < count($lineas)){
			$instruccion= $instruccion.$lineas[$i+1]."\n";	
		}
		 
     	$datosLinea['instruccion']= $instruccion;
    	$datosLinea['ejercicio_id']= $idInsert;
		$datosLinea['orden']= $ordenador;
		
		$this->sentencia_model->crearsentencia($datosLinea); 
		
		$ordenador++; 
	  }
  
	$datos['notificacion'] = 'Se creo el ejercicio exitosamente'; 
	 
	$datos['titulo'] = 'Ejercicios'; 
	 
	//consultar ejercicio 
	$data = $this->ejercicio_model->consultarejercicio(); 
	$datosContenido['data']= $data; 
	$datosContenido['operaciones'] = $this->operacion_model->consultaroperacion(); 
	 
	$datos['contenido'] = $this->load->view('administracion/listarejercicio',$datosContenido,true);			 
	$this->load->view('plantillas/plantilla', $datos);
		 
	} 
	 
	public function actualizar() 
	{ 
		$datos['titulo'] = 'Actualizar ejercicio'; 
		 
		$id = $this->uri->segment(3); 

		//carga de ejercicio
		$objectAct = $this->ejercicio_model->consultarejercicioById($id); 
		 
		
		if($objectAct!=false){ 
							 
			foreach ($objectAct->result() as $row) 
			{
				 $datosObj['id'] =	$row->id; 
				 $datosObj['enunciado']= $row->enunciado;
				 $datosObj['lista_inicial']= $row->lista_inicial;
				 $datosObj['operacionSel'] = $row->operacion_id;
			}
		}
		
		//carga de sentencias
		
		$codigoAct ="";
		$sentencias = $this->sentencia_model->consultarsentenciaByEjercicio($id); 
		
		if($sentencias!=false){ 
							 
			foreach ($sentencias->result() as $row) 
			{	
				$codigoAct=$codigoAct.$row->instruccion;
			}
		}
		
		$datosObj['lineas'] = $codigoAct;
		
		//secargan las operaciones
		$datosObj['operacionesAsoc'] = $this->operacion_model->consultaroperacion(); 
		
		
		 
		$datos['contenido'] = $this->load->view('administracion/insertmodejercicio',$datosObj,true);		 
		$this->load->view('plantillas/plantilla', $datos);
	} 
	 
	public function actualizarAcc() 
	{ 
		
		 //actualizacion ejercicio
		$datosActualizar['id']= $this->input->post('txtid');
		$datosActualizar['enunciado']= $this->input->post('txtaEnunciado');
		$datosActualizar['lista_inicial']= $this->input->post('txtlista_inicial');
		$datosActualizar['operacion_id']= $this->input->post('txtoperacion_id');
		$this->ejercicio_model->actualizarejercicio($datosActualizar['id'],$datosActualizar); 
		
		//actualizacion de lineas asociadas
		//se elimianan todas las lienas asociadas al ejercicio
		$this->sentencia_model->eliminarSentenciaByEjercicio($datosActualizar['id']);
		//se actualizan las nuevas sentencias al ejerccio
		$codigoEjercicio = $this->input->post('txtaLienas');
		$lineas = explode("\n",$codigoEjercicio);
		
		$ordenador =1;
		
		for($i=0; $i < count($lineas) ; $i += 2){
		 
			//inserta lineas
			$instruccion= $lineas[$i]."\n";
			
			if(($i+1) < count($lineas)){
				$instruccion= $instruccion.$lineas[$i+1]."\n";	
			}
			 
			$datosLinea['instruccion']= $instruccion;
			$datosLinea['ejercicio_id']= $datosActualizar['id'];
			$datosLinea['orden']= $ordenador;
			
			$this->sentencia_model->crearsentencia($datosLinea); 
			
			$ordenador++; 
		}
		
		$datos['notificacion'] = 'Se Actualizo el ejercicio exitosamente'; 
		 
		$datos['titulo'] = 'Ejercicios'; 
		 
		//consultar ejercicio 
		$data = $this->ejercicio_model->consultarejercicio(); 
		$datosContenido['data']= $data; 
		$datosContenido['operaciones'] = $this->operacion_model->consultaroperacion(); 
		 
		$datos['contenido'] = $this->load->view('administracion/listarejercicio',$datosContenido,true);			 
		$this->load->view('plantillas/plantilla', $datos);
	} 
	 
	public function eliminar() 
	{ 
		$id = $this->uri->segment(3); 
		
		//se eliminan las sentencias del ejerccio
		$this->sentencia_model->eliminarSentenciaByEjercicio($id);
		//se eliminan el ejercicio
		$this->ejercicio_model->eliminarEjercicio($id); 
		
		$datos['notificacion'] ='   Se Elimino el ejercicio exitosamente'; 
		 
		$datos['titulo'] = 'Ejercicios'; 
		 
		//consultar ejercicio 
		$data = $this->ejercicio_model->consultarejercicio(); 
		$datosC['data']= $data; 
		$datosC['operaciones'] = $this->operacion_model->consultaroperacion(); 
		 
		$datos['contenido'] = $this->load->view('administracion/listarejercicio',$datosC,true);		 
		$this->load->view('plantillas/plantilla', $datos);
		 
	} 
} 

