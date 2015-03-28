<main id="marco">
	<h2>Eliminar nodos en una lista simple</h2>
	<p></p>
	<p id="enunciado">Ejemplo: <?= $enunciado; ?></p>
	<p>Lista Inicial: <label class="lista_inicial" ><?= $lista; ?></label>
	</p>
	<section class="sec-canvas inline-block-top">
		<canvas id="canvas" class="canvas" width="700" height="300"></canvas>
		<p>Dato(s) actuales en la Lista:
		<label class="lista_inicial" id="lista" ><?= $lista; ?></label>
		<script type="text/javascript" src="<?php echo base_url();?>js/animacion/animacion.js"></script>
		</p>
	</section>
	<div class="div-botones inline-block-top">
		<button id="eliminar-inicio">Eliminar Primero</button>
		<button id="eliminar-nodo">Eliminar Intermedio</button>
		<button id="eliminar-final">Eliminar Último</button>
	</div>
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
</main>
		
	