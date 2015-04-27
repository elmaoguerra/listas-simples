<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
	function __construct(){ 
		parent::__construct();
		$this->load->model('LoginModel', 'acceso');
		$this->acceso->_validar_sesion();
		$this->load->model('usuario_model');
		$this->load->model('resultado_model');
		
		//carga helper perfiles
		$this->load->helper('perfiles');
	}

	function index()
	{
		$codigo = $this->session->userdata('codigo');
		
		$query = $this->usuario_model->consultarusuarioById($codigo);
		$usuario = $query->row();
		
		$query = $this->resultado_model->consultarresultadoPorUsuario($codigo);
		$resultados = ($query !== FALSE) ? $query->result() : FALSE ;
		$resultados = get_ejer_intentos($resultados);
		
		$query = $this->resultado_model->consultar_aprendizaje($codigo);
		$aprendizaje = $query->row();

		$query = $this->resultado_model->consultar_promedio_operaciones($codigo);
		$operaciones = ($query!==FALSE) ? $query->result() : NULL;

		$datos['nombre'] = $this->session->userdata('nombre');
		$datos['grupo']  = $this->session->userdata('grupo');
		$datos['codigo'] = $codigo;
		$datos['email'] = $usuario->email;

		$datos['eficiencia'] = round($aprendizaje->eficiencia_gen);
		$datos['eficacia'] = convertir_tiempo($aprendizaje->tiempo_gen);		
		$datos['total_ejer'] = $resultados['total_ejer'];
		$datos['intentos'] 	= $resultados['intentos'];
		$datos['media'] 	= $resultados['media'];
		$datos['intento_1'] = $resultados['intento_1'];
		$datos['intento_2'] = $resultados['intento_2'];
		$datos['intento_3'] = $resultados['intento_3'];
		$datos['intento_4'] = $resultados['intento_4'];
		$datos['operaciones'] = $operaciones;

		$datos['titulo'] = $this->session->userdata('nombre');
		$datos['js'] = 	"";
		//$this->output->enable_profiler(TRUE);
		//		$datos['contenido'] = "perfil";
		$datos['contenido']= $this->load->view('perfil',$datos,true);
		$this->load->view('plantillas/plantilla', $datos);
	}
}