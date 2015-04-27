<?php
function tiempo_en_seg($val1, $val2)
{
	$dateTime1 = new DateTime($val1);
	$dateTime2 = new DateTime($val2);
	$inter = $dateTime1->diff($dateTime2);

	$seg = ($inter->h * 3600) + ($inter->i * 60) + ($inter->s);
	return $seg;// Devuelve los segundos que empleó el usuario
}

function calcular_eficiencia($intentos)
{
	return round((3*100/$intentos)/3);
}

function definir_op($nombre)
{
	$nombre = strtolower($nombre);
	if (strpos($nombre, 'recorrer')!==FALSE || strpos($nombre, 'modificar')!==FALSE) {
		return 'operaciones/modificar';
	}elseif (strpos($nombre, 'insertar')!==FALSE) {
		return 'operaciones/insertar';
	}elseif (strpos($nombre, 'eliminar')!==FALSE) {
		return 'operaciones/eliminar';
	}else{
		return 'operaciones';
	}
}


function ejercicio_aleatorio($objectAct = FALSE)
{	
	if ($objectAct !== FALSE) {
		$n = mt_rand(0, count($objectAct));
		$objectAct = $objectAct->result();
		$ejercicio = $objectAct[$n];
		return $ejercicio;
	}
	return FALSE;
}