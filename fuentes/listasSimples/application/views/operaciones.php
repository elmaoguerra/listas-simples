<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Recorrer una Lista</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/estilo-menu.css">
	<?= $js;?>
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
	<main id="marco">
		<h2>Operaciones en una lista simple</h2>
		<p>Para todas las operaciones en una lista se utiliza el apuntador al nodo Cabeza,
		 es decir, el apuntador al primer nodo de la lista.</p>
		<p>Este apuntador lo llamaremos ptrLista.</p>
		<p>A continuación se exponen las principales operaciones 
			que se pueden realizar en una lista simplemente enlazada.
		</p>
		<article>
			<h3 id="recorrer-lista">Recorrer</h3>
			<p></p>

			<p class="enunciado"><?= $enunciado; ?></p>
			<label class="lista_inicial" ><?= $lista; ?></label>
			<section class="sec-canvas inline-block-top">
				<canvas id="canvas-recorrer" class="canvas" width="700" height="300"></canvas>
				<label>Dato(s) en la Lista:
					<label class="lista_inicial" id="lista" ><?= $lista; ?></label>
					<script type="text/javascript" src="<?php echo base_url();?>js/animacion/animacion.js"></script>
				</label>
			</section>
			<div class="div-botones inline-block-top">
				<button id="recorrer">Recorrer Lista</button>
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
			<div id="sec-botones" class="inline-block-top">
				<button id="crear-nodo">Crear Nodo</button>
				<button id="insertar-inicio">Insertar al Inicio</button>
				<button id="insertar-despues">Insertar Despues</button>
				<button id="insertar-final">Insertar al Final</button>
				<button id="modificar-nodo">Modificar Nodo</button>
				<button id="eliminar-nodo">Eliminar Nodo</button>
				<button id="eliminar-inicio">Eliminar Inicio</button>
				<button id="eliminar-final">Eliminar Ultimo</button>
			</div>
		</article>
	</main>
	<footer>
		<p>Hola Mundo</p>
	</footer>
	<script type="text/javascript" >inicio();</script>
</body>
</html>