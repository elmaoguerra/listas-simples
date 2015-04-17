<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
	function __construct(){ 
		parent::__construct();
		$this->load->model('LoginModel', 'acceso');
		$this->acceso->_validar_sesion();
		$this->load->model('usuario_model');
		$this->load->model('resultado_model');
	}

	function index()
	{
		$codigo = $this->session->userdata('codigo');
		
		$query = $this->usuario_model->consultarusuarioById($codigo);
		$usuario = $query->row();
		
		$query = $this->resultado_model->consultarresultadoPorUsuario($codigo);
		$resultados = $query->result();
		$resultados = $this->_get_ejer_intentos($resultados);
		
		$query = $this->resultado_model->consultar_aprendizaje($codigo);
		$eficiencia = $query->row();

		$datos['nombre'] = $this->session->userdata('nombre');
		$datos['grupo']  = $this->session->userdata('grupo');
		$datos['codigo'] = $codigo;
		$datos['email'] = $usuario->email;

		$datos['eficiencia'] = $eficiencia->eficiencia_gen;
		$datos['eficacia'] = $this->_convertir_tiempo($eficiencia->tiempo_gen);		
		$datos['total_ejer'] = $resultados['total_ejer'];
		$datos['intentos'] = $resultados['intentos'];
		$datos['media'] = $resultados['media'];
		$datos['intento_1'] = $resultados['intento_1'];
		$datos['intento_2'] = $resultados['intento_2'];
		$datos['intento_3'] = $resultados['intento_3'];
		$datos['intento_4'] = $resultados['intento_4'];

		$datos['titulo'] = $this->session->userdata('nombre');
		$datos['js'] = 	"";
		$datos['contenido'] = "perfil";
		$this->load->view('plantillas/plantilla', $datos);
	}

	function _convertir_tiempo($tiempo_en_segundos)
	{
		$horas = floor($tiempo_en_segundos / 3600);
		$minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
		$segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);
	 
		$hora_texto = "";
		if ($horas > 0 ) {
			$hora_texto .= $horas . "h ";
		}
	 
		if ($minutos > 0 ) {
			$hora_texto .= $minutos . "m ";
		}
	 
		if ($segundos > 0 ) {
			$hora_texto .= $segundos . "s";
		}
	 
		return $hora_texto;
	}

	function _get_ejer_intentos($resultados)
	{
		$intentos = 0;
		$total_ejer = count($resultados);

		$datos['intento_1'] = 0;
		$datos['intento_2'] = 0;
		$datos['intento_3'] = 0;
		$datos['intento_4'] = 0;

		foreach ($resultados as $res) {
			$eficiencia = $res->eficiencia;
			if ($eficiencia == 100) {
				$intentos += 1;
				$datos['intento_1']++;
			}elseif ($eficiencia == 50) {
				$intentos += 2;
				$datos['intento_2']++;
			}elseif ($eficiencia == 33) {
				$intentos += 3;
				$datos['intento_3']++;
			}else{
				$intentos += 3;
				$datos['intento_4']++;
			}
		}
		$datos['intentos'] = $intentos;
		$datos['total_ejer'] = $total_ejer;
		$datos['media'] = number_format(($intentos/$total_ejer), 2, ',', '');

		return $datos;
	}
}