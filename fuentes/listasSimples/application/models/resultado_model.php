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

	function consultarresultadoPorUsuario($usuario){
		$this->db->where('usuario',$usuario);
		$query = $this->db->get('resultado'); 

		if($query->num_rows() >0 ) return $query; 
		else return false; 
	} 

// 	SELECT o.name, avg(r.tiempo), avg(r.eficiencia)
// FROM resultado r
// join ejercicio e on
// r.ejercicio_id = e.id 
// join operacion o on
// e.operacion_id = o.id
// where r.usuario=2
// group by o.name


	function consultar_aprendizaje($usuario)
	{
		$sql = "select avg(eficiencia)as eficiencia_gen, sum(tiempo)as tiempo_gen
		FROM `resultado` WHERE usuario = ?";
		$query = $this->db->query($sql, array($usuario));
		if ($query->num_rows() > 0) return $query;
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