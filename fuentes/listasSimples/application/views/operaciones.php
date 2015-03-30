<main id="marco">
	<h2>Operaciones en una lista simple</h2>
	<p>Para todas las operaciones en una lista se utiliza el apuntador al nodo Cabeza,
	 es decir, el apuntador al primer nodo de la lista.</p>
	<p>Este apuntador lo llamaremos ptrLista.</p>
	<p>A continuación se exponen las principales operaciones 
		que se pueden realizar en una lista simplemente enlazada.
	</p>
	<h3>Recorrer</h3>
	<p></p>
	<p id="enunciado">Ejemplo: <?= $enunciado; ?></p>
	<p>Lista Inicial: <label class="lista_inicial" ><?= $lista; ?></label>
	</p>
	<section id="sec-codigo">
		<form action="operaciones/enviar" method="post">
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
