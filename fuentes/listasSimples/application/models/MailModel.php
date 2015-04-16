<?php

class MailModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function enviar($datos){
		
		//Enviar correo
		$config = array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'pigui95@gmail.com',
		  'smtp_pass' => 'america13',
		  'mailtype' =>'html',
		  'charset' => 'iso-8859-1',
          'wordwrap' => TRUE,
		);

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('pigui9@gmail.com', 'Curso Listas Simples');
		$this->email->to($datos['email']);
		$this->email->subject('Registro');
		
		$this->email->message('<h1>Bienvenido! </h1>'.$datos['nombre'].
								'Usted ha sido registrado en el curso de listas simples! 
								Su código de activacion es: '.$datos['cod_activacion'].'
								<a href="'.base_url().'adminusuariocontroller/confirmar/'.$datos['cod_activacion'].'">Confirmar</a>
								<b>Gracias por su registro</b>');
		
		if($this->email->send()){
			return true;
		}else{
			return false;
		}

	}

}

?>