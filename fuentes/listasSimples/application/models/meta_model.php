<?php 
if( !defined('BASEPATH')) exit('no hay script encontrado!! :( '); 
 
class meta_model extends CI_Model{ 
	 
	function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 
	 
	    function crearmeta($data){
        $this->db->insert('meta', array('id'  => $data['id'], 
'nombre'  => $data['nombre'], 
'metacol'  => $data['metacol']));
} 
 
	    function consultarmeta(){
        $query = $this->db->get('meta');
if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function consultarmeta($id){
        $this->db->where('id',$id);
        $query = $this->db->get('meta'); 

if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function actualizarmeta($id, $data){
        $this->db->where('id',$id);
        $this->db->update('meta', array('id'  => $data['id'], 
'nombre'  => $data['nombre'], 
'metacol'  => $data['metacol']));
} 
	 
} 
 
?> 
