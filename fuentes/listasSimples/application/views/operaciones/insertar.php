<main id="marco">
	<h2>Insertar nodos en una lista simple</h2>
	<p></p>
	<p id="enunciado">Ejemplo: <?= $enunciado; ?></p>
	<p>Lista Inicial: <label class="lista_inicial" ><?= $lista; ?></label>
	</p>
	<section id="sec-codigo">
		<ul id="pseudo-codigo" class="inline-block-top">
		    <h3>Pseudo-código</h3>
		    <?php foreach ($sentencias as $key) {?>
		    	<li><pre class="prettyprint lang-c"><?=$key;?></pre></li>	
		    <?php }?>
		</ul>
		<ul id="codigo" class="inline-block-top">
		    <h3>Código en C</h3>
		    <li><pre class="prettyprint lang-c"><?=$lineas;?></pre></li>
		</ul>
	</section>
	<section class="sec-canvas inline-block-top">
		<p>Dato(s) actuales en la Lista:
		<label class="lista_inicial" id="lista" ><?= $lista; ?></label>
		<script type="text/javascript" src="<?php echo base_url();?>js/animacion/animacion.js"></script>
		</p>
		<canvas id="canvas" class="canvas" width="700" height="300"></canvas>
	</section>
	<div class="div-botones inline-block-top">
		<button id="insertar-inicio">Insertar<br>al Inicio</button>
		<button id="insertar-despues">Insertar<br>Intermedio</button>
		<button id="insertar-final">Insertar<br>al Final</button>
	</div>
	
</main>
		
	
