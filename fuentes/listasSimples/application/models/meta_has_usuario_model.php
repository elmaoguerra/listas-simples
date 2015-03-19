<?php 
if( !defined('BASEPATH')) exit('no hay script encontrado!! :( '); 
 
class meta_has_usuario_model extends CI_Model{ 
	 
	function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 
	 
	    function crearmeta_has_usuario($data){
        $this->db->insert('meta_has_usuario', array('meta_id'  => $data['meta_id'], 
'usuario_codigo'  => $data['usuario_codigo'], 
'usuario_grupo_id'  => $data['usuario_grupo_id'], 
'tiempo'  => $data['tiempo'], 
'eficiencia'  => $data['eficiencia'], 
'fecha'  => $data['fecha']));
} 
 
	    function consultarmeta_has_usuario(){
        $query = $this->db->get('meta_has_usuario');
if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function consultarmeta_has_usuario($id){
        $this->db->where('meta_id',$id);
        $query = $this->db->get('meta_has_usuario'); 

if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function actualizarmeta_has_usuario($id, $data){
        $this->db->where('meta_id',$id);
        $this->db->update('meta_has_usuario', array('meta_id'  => $data['meta_id'], 
'usuario_codigo'  => $data['usuario_codigo'], 
'usuario_grupo_id'  => $data['usuario_grupo_id'], 
'tiempo'  => $data['tiempo'], 
'eficiencia'  => $data['eficiencia'], 
'fecha'  => $data['fecha']));
} 
	 
} 
 
?> 
