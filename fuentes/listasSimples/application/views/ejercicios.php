<main id="marco">
	<h2>Práctica de Ejercicios</h2>
	<p id="enunciado" class="inline-block-top">
		<strong>Enunciado:</strong><?= $enunciado; ?><br><br>
		<strong>Lista Inicial: </strong><label class="lista_inicial" ><?= $lista; ?></label>
	</p>
	<div id="intentos" class="inline-block-top">
		<?php if ($repite) :?>
			<span id="intentos-x"></span>
			<p id="intentos-error">Has tenido un Error<br>
				Intenta de Nuevo</p>
		<?php endif ?>
		<p><strong>Intento <?php echo $this->session->flashdata('intentos'); ?> de 3</strong></p>
	</div>
	<section id="sec-codigo">
		<form action="<?php echo base_url();?>ejercicios/error" method="post">
			<input type="hidden" name="ejercicio" value="<?php echo $id_ejercicio;?>">
			<input type="hidden" name="hora1" value="<?php echo date('H:i:s'); ?>">
		<h3>Pseudo-código</h3>
		<ul id="pseudo-codigo" class="inline-block-top">
		    <?php		    
		    foreach ($sentencias as $key):
		    	if(strlen($key)):?>
		    	<li><pre class="prettyprint lang-c"><?=$key;?></pre>
		    		<input type="hidden" name="sentencias[]" value="<?=$key;?>">
		    	</li>		    	
		    <?php endif;
		    endforeach?>
		</ul>
		<input id="enviar" type="submit"  value="Enviar">
		</form>
	</section>
</main>