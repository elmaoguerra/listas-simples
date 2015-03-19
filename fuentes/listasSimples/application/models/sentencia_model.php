<?php 
if( !defined('BASEPATH')) exit('no hay script encontrado!! :( '); 
 
class sentencia_model extends CI_Model{ 
	 
	function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 
	 
	    function crearsentencia($data){
        $this->db->insert('sentencia', array('id'  => $data['id'], 
'instruccion'  => $data['instruccion'], 
'ejercicio_id'  => $data['ejercicio_id']));
} 
 
	    function consultarsentencia(){
        $query = $this->db->get('sentencia');
if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function consultarsentencia($id){
        $this->db->where('id',$id);
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
	 
} 
 
?> 
