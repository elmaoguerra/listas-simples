<?php

class PrincipalController extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->very_session();

	}

	public function index(){

		if($this->session->userdata('grupo_id') == 1)
			{
				$rol = 'Usuario Solo Ejercicios';
			}
		if($this->session->userdata('grupo_id') == 2)
			{
				$rol = 'Usuario Metas Impuestas';
			}
		if($this->session->userdata('grupo_id') == 3)
			{
				$rol = 'Usuario Elije metas a Cumplir';
			}
		if($this->session->userdata('grupo_id') == 4)
			{
				$rol = 'Usuario Adminitrador';
			}

		$data = array('usuariosession' => $this->session->userdata('nombre'),
						'grupousuariosession' => $this->session->userdata('grupo_id'),
						'rolsession' => $rol);
		$this->load->view('administracion/principal',$data);
		

		
	}

	public function very_session(){
		if(!$this->session->userdata('nombre')){
			redirect(base_url().'index.php/LoginController');
		}
	}
}

?>