<?php
class LoginController extends CI_Controller{

	public function __construct(){
		parent::__construct();
		//carga helper perfiles
		$this->load->helper('perfiles');
	}

	public function index(){
		
		log_message('error', 'JJOC aca estoy LoginController');
		
		if(!$this->session->userdata('login')){
			log_message('error', 'JJOC aca estoy LoginController if 0');
			$this->load->view('login');
		}else{

			if($this->session->userdata('grupo') && $this->session->userdata('grupo') == PERFIL_ADMINISTRADOR){ //panel administrativo
				log_message('error', 'JJOC aca estoy LoginController if 1');
				redirect(base_url().'administracion');
			
			}else if($this->session->userdata('grupo')  && $this->session->userdata('grupo') == PERFIL_SOLO_EJERCICIOS){ // panel estudiante
								log_message('error', 'JJOC aca estoy LoginController if 2');
				redirect(base_url().'definicion');
				
			}
			
		}
	}

	public function very_session()
	{
		if($this->input->post('submit')){
			$this->load->model('LoginModel');
			$cod = $this->security->xss_clean($this->input->post('user'));
			$pass = md5($this->security->xss_clean($this->input->post('pass')));
			
			$variable = $this->LoginModel->very_session($cod, $pass);

			if($variable === TRUE){
				redirect(base_url());
			}else{
				 redirect(base_url().'ingresar');
			}

		}else{
			redirect(base_url().'ingresar');
		}
	}

	public function change_pass()
	{
		if($this->input->post('submit')){
			$this->load->model('LoginModel');
			$cod = $this->security->xss_clean($this->input->post('user'));
			$pass = md5($this->security->xss_clean($this->input->post('pass')));
			
			$variable = $this->LoginModel->change_pass($cod, $pass);

			if($variable === TRUE){
				$this->session->set_flashdata('mensaje', 'Contraseña cambiada con exito. Puede Ingresar al Sistema');
				redirect(base_url().'ingresar');
			}else{
				 echo 'Mal';
			}

		}else{
			redirect(base_url().'ingresar');
		}
	}

	public function close_session(){
		//session_destroy();
		$this->session->sess_destroy();
		redirect(base_url().'ingresar');
	}
}