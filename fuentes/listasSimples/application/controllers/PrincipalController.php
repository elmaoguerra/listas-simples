<?php
class PrincipalController extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->very_session();
	}

	public function index(){

		if($this->session->userdata('grupo') == 1)
			{
				$rol = 'Usuario Solo Ejercicios';
			}
		if($this->session->userdata('grupo') == 2)
			{
				$rol = 'Usuario Metas Impuestas';
			}
		if($this->session->userdata('grupo') == 3)
			{
				$rol = 'Usuario Elije metas a Cumplir';
			}
		if($this->session->userdata('grupo') == 4)
			{
				$rol = 'Usuario Adminitrador';
			}

		$data = array('usuariosession' => $this->session->userdata('nombre'),
						'grupousuariosession' => $this->session->userdata('grupo'),
						'rolsession' => $rol,
						'estadousuario' => $this->session->userdata('estado'));
		$this->load->view('administracion/principal',$data);
	}

	public function very_session(){
		if(!$this->session->userdata('codigo')){
			redirect(base_url().'ingresar');
		}
	}
}