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
			
			return "";
			
		}else{
			return "";
		}
		
	}

?>