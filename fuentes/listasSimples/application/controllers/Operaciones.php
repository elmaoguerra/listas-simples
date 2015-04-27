<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operaciones extends CI_Controller {


	function __construct(){ 
		parent::__construct();
		$this->load->model('LoginModel', 'acceso');
		$this->acceso->_validar_sesion();
		$this->load->model('ejercicio_model'); 
		$this->load->model('sentencia_model'); 
		$this->load->model('operacion_model'); 
		
		//carga helper perfiles
		$this->load->helper('perfiles');
	} 

	public function index()
	{
		$id = 9;
		//carga de ejercicio
		$objectAct = $this->ejercicio_model->consultarejercicioById($id); 
		if($objectAct!=false){ 
							 
			foreach ($objectAct->result() as $row) 
			{
				 //$datos['id'] =	$row->id; 
				 $datos['enunciado']= $row->enunciado;
				 $datos['lista']= $row->lista_inicial;
				 $datos['operacionSel'] = $row->operacion_id;
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

		$aux=explode("\r\n", $codigoAct);
		$datos['titulo'] = "Operaciones en una lista";
		$datos['lineas'] = $codigoAct;
		$datos['sentencias'] = $aux;
		
		$datos['js'] = 	"";
//		$datos['contenido'] = "operaciones";
		$datos['contenido']= $this->load->view('operaciones',"",true);
		$this->load->view('plantillas/plantilla', $datos);
		
	}

	public function modificar()
	{
		$id = 9;
		//carga de ejercicio
		$objectAct = $this->ejercicio_model->consultarejercicioById($id); 
		if($objectAct!=false){ 
							 
			foreach ($objectAct->result() as $row) 
			{
				 //$datos['id'] =	$row->id; 
				 $datos['enunciado']= $row->enunciado;
				 $datos['lista']= $row->lista_inicial;
				 $datos['operacionSel'] = $row->operacion_id;
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

		$aux=explode("\r\n", $codigoAct);
		$datos['titulo'] = "Modificación en una lista";
		$datos['lineas'] = $codigoAct;
		$datos['sentencias'] = $aux;
		$datos['js'] = 	"";

//		$datos['contenido'] = "operaciones/recorrer";
		$datos['contenido']= $this->load->view('operaciones/recorrer',$true,datos);
		$this->load->view('plantillas/plantilla', $datos);
	}

	public function insertar()
	{
		$id = 9;
		//carga de ejercicio
		$objectAct = $this->ejercicio_model->consultarejercicioById($id); 
		if($objectAct!=false){ 
							 
			foreach ($objectAct->result() as $row) 
			{
				 //$datos['id'] =	$row->id; 
				 $datos['enunciado']= $row->enunciado;
				 $datos['lista']= $row->lista_inicial;
				 $datos['operacionSel'] = $row->operacion_id;
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

		$aux=explode("\r\n", $codigoAct);
		$datos['titulo'] = "Inserción en una lista";
		$datos['lineas'] = $codigoAct;
		$datos['sentencias'] = $aux;
		$datos['js'] = 	"";

//		$datos['contenido'] = "operaciones/insertar";
		$datos['contenido']= $this->load->view('operaciones/insertar',$datos,true);
		$this->load->view('plantillas/plantilla', $datos);
	}

	public function eliminar()
	{
		$id = 9;
		//carga de ejercicio
		$objectAct = $this->ejercicio_model->consultarejercicioById($id); 
		if($objectAct!=false){ 
							 
			foreach ($objectAct->result() as $row) 
			{
				 //$datos['id'] =	$row->id; 
				 $datos['enunciado']= $row->enunciado;
				 $datos['lista']= $row->lista_inicial;
				 $datos['operacionSel'] = $row->operacion_id;
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

		$aux=explode("\r\n", $codigoAct);
		$datos['titulo'] = "Eliminación en una lista";
		$datos['lineas'] = $codigoAct;
		$datos['sentencias'] = $aux;
		$datos['js'] = 	"";

//		$datos['contenido'] = "operaciones/eliminar";
		$datos['contenido']= $this->load->view('operaciones/eliminar',$datos,true);
		$this->load->view('plantillas/plantilla', $datos);
	}
}
