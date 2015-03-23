<?php

class LoginModel extends CI_Model{

	function __construct(){
        parent::__construct();
    }


	public function very_session(){
		$consulta = $this->db->get_where('usuario',array(
											'nombre'=>$this->input->post('user',TRUE),
											'password'=>$this->input->post('pass',TRUE)));
		if($consulta->num_rows() == 1)
		{
			return $consulta->row();
		}else{
			return false;
		}

	}
}

?>