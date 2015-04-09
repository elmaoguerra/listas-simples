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
											'operacion_id'  => $data['operacion_id']));
	} 
 
	function consultarejercicio(){
		
        $query = $this->db->get('ejercicio');
		
		if($query->num_rows() >0 ) return $query; 
		else return false; 
	} 
 
	function consultarejercicioById($id){
		
        $this->db->where('id',$id);
        $query = $this->db->get('ejercicio'); 

		if($query->num_rows() >0 ) return $query; 
		else return false; 
	}

	function consultarNombreOpById($id){
		$sql="select operacion.name from operacion join ejercicio on ejercicio.operacion_id=operacion.id where ejercicio.id=?";
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0) return $query;
		else return false;
		
	}
 
	function actualizarejercicio($id, $data){
        $this->db->where('id',$id);
        $this->db->update('ejercicio', array('id'  => $data['id'], 
		'enunciado'  => $data['enunciado'], 
		'lista_inicial'  => $data['lista_inicial'], 
		'operacion_id'  => $data['operacion_id']));
	} 
	
	function eliminarEjercicio($id){
		$this->db->delete('ejercicio', array('id' => $id)); 
	}

	function getMaxId(){
		
		$sql = "SELECT max(id) as id FROM ejercicio "; 
		$query= $this->db->query($sql, array());
		
		if($query->num_rows() >0 ){
			foreach ($query->result() as $row) {
				return $row->id +1;				
			}
		}
		return false;
	}
	
	 
}