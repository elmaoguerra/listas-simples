<main id="marco">
	<h2>Ejercicios</h2>
	<p id="enunciado">Ejemplo: <?= $enunciado; ?></p>
	<p>Lista Inicial: <label class="lista_inicial" ><?= $lista; ?></label>
	</p>
	<section id="sec-codigo">
		<form action="ejercicios/enviar" method="post">
		<h3>Pseudo-código</h3>
		<ul id="pseudo-codigo" class="inline-block-top">
		    <?php 
		    $i=0;
		    foreach ($sentencias as $key):?>
		    	<li><pre class="prettyprint lang-c"><?=$key;?></pre>
		    		<input type="hidden" name="<?php echo "sentencia$i" ?>" value="<?php echo $key ?>">
		    	</li>	
		    <?php 
		    $i++;
		    endforeach?>
		</ul>
		<input type="submit"  value="Enviar">
		</form>
	</section>
</main>
