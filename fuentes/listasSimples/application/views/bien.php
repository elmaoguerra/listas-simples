<main id="marco" style="height: 450px;">
	<div id="bien" class="modalmask">
	    <div class="modalbox movedown">
	        <a href="<?php echo base_url();?>" title="Cerrar" class="close">X</a>
	        <?php if ($tipo==='bien'):?>
	        	<h3>Muy Bien <?php echo $this->session->userdata('nombre');?></h3>
		        <p>Has organizado las sentencias correctamente!</p>
	        <?php elseif ($tipo==='mejorar'): ?>
	        	<h3>Revisa los Ejemplos</h3>
		        <p>Has tenido errores organizando las sentencias.</p>
		        <p>Mira el ejemplo donde se explica la operación donde has tenido errores para mejorar tu eficiencia y eficacia.</p>
	        	<a href="<?php echo base_url().$enlace;?>" title="Mejora!" >Ejemplo</a>
	        <?php endif ?>
	        <a href="<?php echo base_url();?>ejercicios" title="Intentalo!" >Intentar otro Ejercicio</a>
	    </div>
	</div>
	<script type="text/javascript">
		setTimeout(function(){
			document.getElementById('bien').style.opacity="0.9";
			document.getElementById('bien').style.pointerEvents="auto";
			//margin:10% auto;
			document.getElementById('bien').children[0].style.margin="20% auto";
		},200);	
	</script>
</main>