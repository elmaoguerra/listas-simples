<?php
class LoginController extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if(!$this->session->userdata('login')){
			$this->load->view('login');
		}else{
			redirect(base_url().'definicion');
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

	public function close_session(){
		//session_destroy();
		$this->session->sess_destroy();
		redirect(base_url().'ingresar');
	}
}