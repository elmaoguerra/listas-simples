<?php

class LoginController extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('login');
	}

	public function very_session()
	{
		if($this->input->post('submit')){
			$this->load->model('LoginModel');
			$variable = $this->LoginModel->very_session();

			if($variable == true){
				session_start();
				$variables = array(
								'nombre' => $variable->nombre,
								'grupo_id' => $variable->grupo_id
							);
				$this->session->set_userdata($variables);
				redirect(base_url().'index.php/PrincipalController');
			}else{
				$data = array('mensaje' => 'Usuario o contraseña incorrectos');
				$this->load->view('login',$data);
			}

		}else{
			redirect(base_url().'index.php/LoginController');
		}
	}

	public function close_session(){
		session_destroy();
		redirect(base_url().'index.php/LoginController');
	}
}

?>