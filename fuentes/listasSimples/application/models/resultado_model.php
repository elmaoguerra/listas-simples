<?php 
if( !defined('BASEPATH')) exit('no hay script encontrado!! :( '); 
 
class resultado_model extends CI_Model{ 
	 
	function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 
	 
	    function crearresultado($data){
        $this->db->insert('resultado', array('ejercicio_id'  => $data['ejercicio_id'], 
'usuario'  => $data['usuario'], 
'tiempo'  => $data['tiempo'], 
'eficiencia'  => $data['eficiencia'], 
'fecha'  => $data['fecha']));
} 
 
	    function consultarresultado(){
        $query = $this->db->get('resultado');
if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function consultarresultado($id){
        $this->db->where('ejercicio_id',$id);
        $query = $this->db->get('resultado'); 

if($query->num_rows() >0 ) return $query; 
else return false; 
} 
 
	    function actualizarresultado($id, $data){
        $this->db->where('ejercicio_id',$id);
        $this->db->update('resultado', array('ejercicio_id'  => $data['ejercicio_id'], 
'usuario'  => $data['usuario'], 
'tiempo'  => $data['tiempo'], 
'eficiencia'  => $data['eficiencia'], 
'fecha'  => $data['fecha']));
} 
	 
} 
 
?> 
