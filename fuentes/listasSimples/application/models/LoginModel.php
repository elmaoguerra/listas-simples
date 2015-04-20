<?php

class LoginModel extends CI_Model{	 


	function __construct(){
        parent::__construct();
    }


	public function very_session($codigo, $password){
		$consulta = $this->db->get_where('usuario',
			array('codigo'=>$codigo,
				'password'=>$password
			));
		if($consulta->num_rows() === 1)
		{
			$var = $consulta->row();
			$this->session->set_userdata('codigo', $var->codigo);
			$this->session->set_userdata('nombre', $var->nombre);
			$this->session->set_userdata('grupo', $var->grupo_id);
			$this->session->set_userdata('estado', $var->estado);
			if($var->estado==='Inactivo')
			{
				$this->session->set_flashdata('mensaje', 'El usuario se encuentra temporalmente inactivo.');
			}
			else{
				$this->session->set_userdata('login', true);
				return TRUE;
			}

		}else{
			
			$this->session->set_flashdata('mensaje', 'Código y/o contraseña invalidos.');
		}

	}

	function _validar_sesion(){
		if(!$this->session->userdata('codigo')){
			redirect(base_url().'ingresar');
		}
	}

	public function change_pass($codigo, $password){
		$consulta = $this->db->get_where('usuario',
			array('cod_activacion'=>$codigo));
		if($consulta->num_rows() === 1)
		{
			$this->db->where('cod_activacion',$codigo);
       		$this->db->update('usuario', array('password'  => $password));

			return TRUE;
		}else{
			return FALSE;
		}

	}
}
