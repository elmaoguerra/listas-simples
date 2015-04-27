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
	<h3>Estadisticas</h3>
	<section>
		<article class="inline-block-top">
			<p><strong>Total de ejercicios realizados: </strong><?php echo $total_ejer;?></p>
			<p><strong>Total de intentos realizados: </strong><?php echo $intentos;?></p>
			<p><strong>Media intentos: </strong><?php echo $media;?> intentos/ejercicio</p>
			<p><strong>Operación más eficiente que maneja: </strong></p>
			<p><strong>Operación más eficaz que maneja: </strong></p>
		</article>
		<article class="inline-block-top">
			<p><strong>Ejercicios realizados en 1 intento: </strong><?php echo $intento_1; ?></p>
			<p><strong>Ejercicios realizados en 2 intentos: </strong><?php echo $intento_2; ?></p>
			<p><strong>Ejercicios realizados en 3 intentos: </strong><?php echo $intento_3; ?></p>
			<p><strong>Ejercicios No cumplidos en los 3 intentos: </strong><?php echo $intento_4; ?></p>
		</article>
		<table>
			<caption>table title and/or explanatory text</caption>
			<thead>
				<tr>
					<th>Operación</th>
					<th>Tiempo Promedio</th>
					<th>Eficiencia Promedio</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($operaciones as $op) : ?>
					
				<tr>
					<td><?php echo $op->op; ?></td>
					<td><?php echo convertir_tiempo($op->time); ?></td>
					<td><?php echo $op->efi; ?>%</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</section>
</main>