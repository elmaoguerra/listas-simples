<?php

class MailModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function enviar(){
		

		//Enviar correo
		

		$config = array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'pigui95@gmail.com',
		  'smtp_pass' => 'america13',

		);

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");

		$this->email->from('pigui9@gmail.com', 'Curso Listas Simples');
		$this->email->to('listassimples@gmail.com');
		$this->email->cc('erwinpardoq@hotmail.com');
		$this->email->subject('Registro');
		$this->email->message('Usted ha sido registrado en el curso de listas simples!');
		
		if($this->email->send()){
			return true;
		}else{
			return false;
		}

	}

}

?>