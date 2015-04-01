<main id="marco">
	<h2>Ejercicios</h2>
	<p id="enunciado">Ejemplo: <?= $enunciado; ?></p>
	<p>Lista Inicial: <label class="lista_inicial" ><?= $lista; ?></label>
	</p>
	<section id="sec-codigo">
		<form action="<?php echo base_url();?>ejercicios/enviar" method="post">
			<input type="hidden" name="ejercicio" value="<?php echo $id_ejercicio;?>">
		<h3>Pseudo-código</h3>
		<ul id="pseudo-codigo" class="inline-block-top">
		    <?php		    
		    foreach ($sentencias as $key):?>
		    	<li><pre class="prettyprint lang-c"><?=$key;?></pre>
		    		<input type="hidden" name="sentencias[]" value="<?=$key;?>">
		    	</li>	
		    <?php endforeach?>
		</ul>
		<input type="submit"  value="Enviar">
		</form>
	</section>
</main>