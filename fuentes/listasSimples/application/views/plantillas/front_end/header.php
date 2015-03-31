<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?=$titulo;?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/estilo-menu.css">
	<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?autoload=true&skin=desert"></script>
	<?=$js;?>
</head>
<body>
	<header>
	<h1 class="inline-block-top"><a  href="<?php echo base_url();?>" >Listas Simplemente<br/>Enlazadas</a></h1>
	<nav id="sec-menu" class="inline-block-top">
	    <ul class="menu">
	        <li class="inline-block-top"><a href="<?php echo base_url();?>definicion">Definición</a></li>
	        <li class="inline-block-top"><a href="<?php echo base_url();?>operaciones">Operaciones</a></li>
	     	<li class="inline-block-top"><a href="<?php echo base_url();?>ejercicios">Ejercicios</a></li>
	     	<?php if($this->session->userdata('codigo')): ?>
	     	<li class="inline-block-top">
	     		<?php $nombre = $this->session->userdata('nombre');?>
	     		<a class="perfil" href="<?php echo base_url();?>perfil">
	     			<?php echo  $nombre;?>
	     		</a>
	     	</li>
	     	<?php endif ?>
	    </ul>
	</nav>
	<div id="perfil">
	<?php if($this->session->userdata('codigo')): ?>
	Bienvenido: <?php echo $this->session->userdata('codigo') ?>
	<a href="<?php echo base_url();?>salir">Cerrar Sesión</a>
	<?php else:?>
	<a href="<?php echo base_url();?>ingresar">Iniciar Sesión</a>
	<?php endif ?>
	</div>	
	</header>
	