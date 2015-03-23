<?php 
if( !defined('BASEPATH')) exit('no hay script encontrado!! :( '); 
 
class usuario_model extends CI_Model{ 
	 
	function __construct(){ 
		parent::__construct(); 
		$this->load->database();
		
	} 
	 
	function crearusuario($data){
        $this->db->insert('usuario', array('codigo'  => $data['codigo'], 
											'nombre'  => $data['nombre'], 
											'email'  => $data['email'], 
											'password'  => $data['password'], 
											'grupo_id'  => $data['grupo_id']));


        
	} 
 
	function consultarusuario(){
        $query = $this->db->get('usuario');
		if($query->num_rows() >0 ) return $query; 
		else return false; 
	} 
 
	function consultarusuarioById($id){
        $this->db->where('codigo',$id);
        $query = $this->db->get('usuario'); 

		if($query->num_rows() >0 ) return $query; 
		else return false; 
	} 
 
	function actualizarusuario($id, $data){
        $this->db->where('codigo',$id);
        $this->db->update('usuario', array('codigo'  => $data['codigo'], 
											'nombre'  => $data['nombre'], 
											'email'  => $data['email'], 
											'password'  => $data['password'], 
											'conexion'  => $data['conexion'], 
											'grupo_id'  => $data['grupo_id']));
	} 
	 
	function eliminarusuario($id){
		$this->db->delete('usuario', array('codigo' => $id)); 
	}
	 
} 
 
?> 

