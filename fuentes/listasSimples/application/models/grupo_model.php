<?php 
if( !defined('BASEPATH')) exit('no hay script encontrado!! :( '); 
 
class grupo_model extends CI_Model{ 
	 
	function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 
	 
	    function creargrupo($data){
        $this->db->insert('grupo', array('id'  => $data['id'], 
'nombre'  => $data['nombre'], 
'metas'  => $data['metas'], 
'autoreflexion'  => $data['autoreflexion']));
} 
 
	    function consultargrupo(){
        $query = $this->db->get('grupo');
if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function consultargrupo($id){
        $this->db->where('id',$id);
        $query = $this->db->get('grupo'); 

if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function actualizargrupo($id, $data){
        $this->db->where('id',$id);
        $this->db->update('grupo', array('id'  => $data['id'], 
'nombre'  => $data['nombre'], 
'metas'  => $data['metas'], 
'autoreflexion'  => $data['autoreflexion']));
} 
	 
} 
 
?> 
