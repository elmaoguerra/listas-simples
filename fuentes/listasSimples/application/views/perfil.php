<main id="marco">
	<section>
		<h2>Perfil</h2>
		<article id="mi-perfil" class="inline-block-top">
			<h3>Datos del usuario</h3>
			<p><strong>Código: </strong><?php echo $codigo;?></p>
			<p><strong>Nombre: </strong><?php echo $nombre;?></p>
			<p><strong>e-mail: </strong><?php echo $email;?></p>
			<p><strong>Grupo: </strong><?php echo $grupo;?></p>
		</article>
		<article id="aprendizaje" class="inline-block-top">
			<h3>Aprendizaje</h3>
			<p><strong>Eficiencia Promedio: </strong><?php echo $eficiencia.'%';?></p>
			<p><strong>Tiempo empleado en ejercicios: </strong><?php echo $eficacia;?></p>
		</article>
	</section>
	<section>
		<h3>Estadisticas</h3>
		<article class="inline-block-top">
			<p><strong>Total de ejercicios realizados: </strong><?php echo $total_ejer;?></p>
			<p><strong>Total de intentos realizados: </strong><?php echo $intentos;?></p>
			<p><strong>Media intentos: </strong><?php echo $media;?> intentos/ejercicio</p>
		</article>
		<article class="inline-block-top">
			<p><strong>Ejercicios realizados en 1 intento: </strong><?php echo $intento_1; ?></p>
			<p><strong>Ejercicios realizados en 2 intentos: </strong><?php echo $intento_2; ?></p>
			<p><strong>Ejercicios realizados en 3 intentos: </strong><?php echo $intento_3; ?></p>
			<p><strong>Ejercicios No cumplidos en los 3 intentos: </strong><?php echo $intento_4; ?></p>
		</article>
	</section>
	<?php if(isset($operaciones)) :?>
	<section>
		<article class="inline-block-top">
		<h3>Detalles de Aprendizaje</h3>
		<?php 
			$max_efica['num'] = $operaciones[0]->time;
			$max_efica['op']  = $operaciones[0]->op;
			$max_efici['num'] = 0;
		?>
		<table id="detalle-op">
			<caption>A continuación se presenta el eficacia y eficiencia promedio 
			de cada operación ejercitada.</caption>
			<thead>
				<tr>
					<th>Operación</th>
					<th>Tiempo<br>Promedio</th>
					<th>Eficiencia<br>Promedio</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($operaciones as $op) : 
					if ($op->time < $max_efica['num']) {
						$max_efica['op']=$op->op;
						$max_efica['num'] = $op->time;
					}
					if ($op->efi > $max_efici['num']) {
						$max_efici['op']=$op->op;
						$max_efici['num'] = $op->efi;
					}						
				?>
				<tr>
					<td><?php echo $op->op; ?></td>
					<td><?php echo convertir_tiempo($op->time); ?></td>
					<td><?php echo round($op->efi); ?>%</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
			<p><strong><?php echo $max_efici['op'];?></strong> es la operación que realiza eficientemente.</p>
			<p><strong><?php echo $max_efica['op'];?></strong> es la operación que realiza eficazmente.</p>
		</article>	
	</section>
<?php endif ?>
</main>