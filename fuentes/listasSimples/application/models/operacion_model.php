<?php 
if( !defined('BASEPATH')) exit('no hay script encontrado!! :( '); 
 
class operacion_model extends CI_Model{ 
	 
	function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 
	 
	function crearoperacion($data){
        $this->db->insert('operacion', array('name'  => $data['name'], 
											'descripcion'  => $data['descripcion']));
	} 
 
	function consultaroperacion(){
        $query = $this->db->get('operacion');
		if($query->num_rows() >0 ) return $query; 
		else return false; 
	} 
 
	function consultaroperacionById($id){
        $this->db->where('id',$id);
        $query = $this->db->get('operacion'); 

		if($query->num_rows() >0 ) return $query; 
		else return false; 
	} 
 
	function actualizaroperacion($id, $data){
        $this->db->where('id',$id);
        $this->db->update('operacion', array('name'  => $data['name'], 
											 'descripcion'  => $data['descripcion']));
	} 
	 
	function eliminaroperacion($id){
		$this->db->delete('operacion', array('id' => $id)); 
	}
} 
 
?> 

