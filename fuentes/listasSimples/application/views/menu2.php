<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Animando</title>
	<link rel="stylesheet" type="text/css" href="../../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilo-menu.css">
	<script type="text/javascript" src="../../js/animacion/animacion.js"></script>
</head>
<body>
	<header>
		<a class="inline-block-top" href="#" >Listas Simplemente<br/> Enlazadas</a>
		<div id="perfil" class="inline-block-top">Datos del Perfil </div>
	</header>
	<div id="marco">
	<section id="sec-menu" class="inline-block-top">
	    <ul class="menu">
	        <li><a href="#">Definición</a></li>
	        <li><a href="#">OPERACIONES</a>
	     		<ul>
	     		    <li><a href="#">Crear</a></li>
	     		    <li><a href="#">Insertar</a></li>
	     		    <li><a href="#">Modificar</a></li>
	     		    <li><a href="#">Borrar</a></li>
	     		</ul>
	     	</li>
	     	<li><a href="#">Ejemplos</a></li>
	     	<li><a href="#">Ejercicios</a></li>
	     	<li><a href="#">Salir</a></li>
	    </ul>
	</section>
	<section id="sec-canvas" class="inline-block-top">
		<canvas id="canvas" width="700" height="250"></canvas>
		<div id="sec-botones">
			<button id="crear-nodo">Crear Nodo</button>
			<button id="recorrer">Recorrer Lista</button>
			<button id="insertar-inicio">Insertar al Inicio</button>
			<button id="insertar-despues">Insertar Despues de un Nodo</button>
			<button id="insertar-final">Insertar al Final</button>
		</div>
	
	</section>
	<section id="sec-codigo" class="inline-block-top">
		<ul id="codigo">
		    <li>Aquí van las líneas de Código</li>
		    <li>afagasg</li>
		    <li>sdfgswh</li>
		    <li>htesas</li>
		</ul>
	</section>
	</div>
	<footer></footer>
	<script type="text/javascript" >inicio();</script>
</body>
</html>