<?php

	function getMenuByPerfil($perfil){
		if($perfil == PERFIL_SOLO_EJERCICIOS ){
			
			return "<ul class=\"menu\">
					<li class=\"inline-block-top\"><a href=\"".base_url()."definicion\">Definición</a></li>
							<li class=\"inline-block-top\"><a href=\"".base_url()."operaciones\">Operaciones</a></li>
							<li class=\"inline-block-top\"><a href=\"".base_url()."ejercicios\">Ejercicios</a></li>
					<li class=\"inline-block-top\"><a href=\"".base_url()."ayuda\">Ayuda</a></li>
					</ul>";
			
		}else if($perfil == PERFIL_ADMINISTRADOR){
			
			return  "<ul class=\"menu\">
					<li class=\"inline-block-top\"><a href=\"".base_url()."usuariosAdministracion\">Usuarios</a></li>
							<li class=\"inline-block-top\"><a href=\"".base_url()."ejerciciosAdministracion\">Ejercicios</a></li>
							<li class=\"inline-block-top\"><a href=\"".base_url()."estadisticas\">Estadisticas</a></li>
					<li class=\"inline-block-top\"><a href=\"".base_url()."ayuda\">Ayuda</a></li>
					</ul>";
			
		}else{
			return "";
		}
		
	}

	function convertir_tiempo($tiempo_en_segundos)
	{
		$horas = floor($tiempo_en_segundos / 3600);
		$minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
		$segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);
	 
		$hora_texto = "";
		if ($horas > 0 ) {
			$hora_texto .= $horas . "h ";
		}
	 
		if ($minutos > 0 ) {
			$hora_texto .= $minutos . "m ";
		}
	 
		if ($segundos > 0 ) {
			$hora_texto .= $segundos . "s";
		}
	 
		return $hora_texto;
	}

	function get_ejer_intentos($resultados)
	{
		$intentos = 0;
		$total_ejer = count($resultados);

		$datos['intento_1'] = 0;
		$datos['intento_2'] = 0;
		$datos['intento_3'] = 0;
		$datos['intento_4'] = 0;

		foreach ($resultados as $res) {
			$eficiencia = $res->eficiencia;
			if ($eficiencia == 100) {
				$intentos += 1;
				$datos['intento_1']++;
			}elseif ($eficiencia == 50) {
				$intentos += 2;
				$datos['intento_2']++;
			}elseif ($eficiencia == 33) {
				$intentos += 3;
				$datos['intento_3']++;
			}else{
				$intentos += 3;
				$datos['intento_4']++;
			}
		}
		$datos['intentos'] = $intentos;
		$datos['total_ejer'] = $total_ejer;
		$datos['media'] = number_format(($intentos/$total_ejer), 2, ',', '');

		return $datos;
	}