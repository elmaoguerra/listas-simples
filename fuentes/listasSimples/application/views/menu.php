<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Animando</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/estilo-menu.css">
	<?= $js;?>
	<script>$(function() {$( "#pseudo-codigo" ).sortable({
	placeholder: "ui-state-highlight"});
	$( "#pseudo-codigo" ).disableSelection();});</script>
</head>
<body>
	<header>
		<h1><a class="inline-block-top" href="#" >Listas Simplemente<br/>Enlazadas</a></h1>
		<div id="perfil" class="inline-block-top">Datos del Perfil </div>
	</header>
	<nav id="sec-menu">
	    <ul class="menu">
	        <li class="inline-block-top"><a href="#">Definición</a></li>
	        <li class="inline-block-top"><a href="#">Operaciones</a>
	     		<ul>
	     		    <li><a href="#">Crear</a></li>
	     		    <li><a href="#">Insertar</a></li>
	     		    <li><a href="#">Modificar</a></li>
	     		    <li><a href="#">Borrar</a></li>
	     		</ul>
	     	</li>
	     	<li class="inline-block-top"><a href="#">Ejercicios</a></li>
	     	<li class="inline-block-top"><a href="#">Salir</a></li>
	    </ul>
	</nav>
	<div id="marco">
		<p id="enunciado"><?= $enunciado; ?></p>
		<label id="lista_inicial" ><?= $lista; ?></label>
		<section id="sec-canvas" class="inline-block-top">
			<canvas id="canvas-recorrer" class="canvas" width="700" height="300"></canvas>
			<label>Dato(s) en la Lista:
				<!-- <label id="lista" >m, a, o</label> -->
				<label id="lista" ><?= $lista; ?></label>
				<script type="text/javascript" src="<?php echo base_url();?>js/animacion/animacion.js"></script>
			</label>
		</section>
		<div id="sec-botones" class="inline-block-top">
			<button id="crear-nodo">Crear Nodo</button>
			<button id="recorrer">Recorrer Lista</button>
			<button id="insertar-inicio">Insertar al Inicio</button>
			<button id="insertar-despues">Insertar Despues</button>
			<button id="insertar-final">Insertar al Final</button>
			<button id="modificar-nodo">Modificar Nodo</button>
			<button id="eliminar-nodo">Eliminar Nodo</button>
			<button id="eliminar-inicio">Eliminar Inicio</button>
			<button id="eliminar-final">Eliminar Ultimo</button>
		</div>
		
		<section id="sec-codigo">
			<ul id="pseudo-codigo" class="inline-block-top">
			    <li>Aquí van las líneas En Pseudo-código</li>
			    <?php foreach ($sentencias as $key) {?>
			    	<li><pre class="prettyprint lang-c"><?=$key;?></pre></li>	
			    <?php }?>
			</ul>
			<ul id="codigo" class="inline-block-top">
			    <li>Aquí van las líneas de C++</li>
			    <pre class="prettyprint lang-c linenums"><?=$lineas;?></pre>
			</ul>
		</section>
	</div>
	<footer>
		<p>Hola Mundo</p>
	</footer>
	<script type="text/javascript" >inicio();</script>
</body>
</html>