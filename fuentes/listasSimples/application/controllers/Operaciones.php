<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operaciones extends CI_Controller {


	function __construct(){ 
		parent::__construct(); 
		$this->load->helper('url');	 
		$this->load->model('ejercicio_model'); 
		$this->load->model('sentencia_model'); 
		$this->load->model('operacion_model'); 
	} 

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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
		
		$datos['lineas'] = $codigoAct;
		$datos['sentencias'] = $aux;

		$datos['js'] = 	"<script src=\"https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?autoload=true&skin=desert\"></script>".
						"<script src=\"//code.jquery.com/jquery-1.10.2.js\"></script>".
						"<script src=\"//code.jquery.com/ui/1.11.4/jquery-ui.js\"></script>";
		//$lista="a, b, c, d";
		//$datos['lista']="A,b,c,d";
		$this->load->view('operaciones', $datos);
		
		 //log_message('debug', 'JJOC prueba log');
		
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
		$datos['contenido'] = "recorrer";

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
		$datos['contenido'] = "insertar";

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
		$datos['contenido'] = "eliminar";

		$this->load->view('plantillas/plantilla', $datos);
	}
}
