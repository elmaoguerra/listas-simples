<?php

class LoginController extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('login');

		//Enviar correo
		
		//$this->load->model('MailModel');
		//$variable2 = $this->MailModel->enviar();
		//if($variable2 == true){
		//		echo 'mensaje enviado';
		//	}else{
		//		echo 'no se envio el mensaje';
		//	}

	}

	public function very_session()
	{
		if($this->input->post('submit')){
			$this->load->model('LoginModel');
			$variable = $this->LoginModel->very_session();

			if($variable == true){
				session_start();
				$variables = array(
								'nombre' => $this->input->post('user')
							);
				$this->session->set_userdata($variables);
				redirect(base_url().'ContenidoController');
			}else{
				$data = array('mensaje' => 'Usuario o contraseña incorrectos');
				$this->load->view('login',$data);
			}

		}else{
			redirect(base_url().'LoginController');
		}
	}

	public function close_session(){
		session_destroy();
		redirect(base_url().'LoginController');
	}
}

?>