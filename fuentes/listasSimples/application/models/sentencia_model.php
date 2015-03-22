<?php 
if( !defined('BASEPATH')) exit('no hay script encontrado!! :( '); 
 
class sentencia_model extends CI_Model{ 
	 
	function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 
	 
	function crearsentencia($data){
        $this->db->insert('sentencia', array('instruccion'  => $data['instruccion'], 
						  					'ejercicio_id'  => $data['ejercicio_id'],
											'orden'  => $data['orden']));
	} 
 
	function consultarsentencia(){
        $query = $this->db->get('sentencia');
		if($query->num_rows() >0 ) return $query; 
		else return false; 
	} 
 
	function consultarsentenciaById($id){
        $this->db->where('id',$id);
        $query = $this->db->get('sentencia'); 

		if($query->num_rows() >0 ) return $query; 
		else return false; 
	} 

	function consultarsentenciaByEjercicio($idEjercicio){
        $this->db->where('ejercicio_id',$idEjercicio);
		$this->db->order_by("orden", "asc");
        $query = $this->db->get('sentencia'); 

		if($query->num_rows() >0 ) return $query; 
		else return false; 
	}
 
	function actualizarsentencia($id, $data){
        $this->db->where('id',$id);
        $this->db->update('sentencia', array('id'  => $data['id'], 
											'instruccion'  => $data['instruccion'], 
											'ejercicio_id'  => $data['ejercicio_id']));
	} 
	
	function eliminarSentenciaByEjercicio($idEjercicio){
		$this->db->delete('sentencia', array('ejercicio_id' => $idEjercicio)); 
	}
	 
} 
 
?> 

