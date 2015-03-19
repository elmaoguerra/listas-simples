<?php 
if( !defined('BASEPATH')) exit('no hay script encontrado!! :( '); 
 
class ejercicio_model extends CI_Model{ 
	 
	function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 
	 
	    function crearejercicio($data){
        $this->db->insert('ejercicio', array('id'  => $data['id'], 
'enunciado'  => $data['enunciado'], 
'lista_inicial'  => $data['lista_inicial'], 
'solucion'  => $data['solucion'], 
'operacion_id'  => $data['operacion_id']));
} 
 
	    function consultarejercicio(){
        $query = $this->db->get('ejercicio');
if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function consultarejercicio($id){
        $this->db->where('id',$id);
        $query = $this->db->get('ejercicio'); 

if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function actualizarejercicio($id, $data){
        $this->db->where('id',$id);
        $this->db->update('ejercicio', array('id'  => $data['id'], 
'enunciado'  => $data['enunciado'], 
'lista_inicial'  => $data['lista_inicial'], 
'solucion'  => $data['solucion'], 
'operacion_id'  => $data['operacion_id']));
} 
	 
} 
 
?> 
