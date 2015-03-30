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
	<h1 class="inline-block-top"><a  href="#" >Listas Simplemente<br/>Enlazadas</a></h1>
	<nav id="sec-menu" class="inline-block-top">
	    <ul class="menu">
	        <li class="inline-block-top"><a href="#">Definición</a></li>
	        <li class="inline-block-top"><a href="<?php echo base_url();?>operaciones">Operaciones</a></li>
	     	<li class="inline-block-top"><a href="#">Ejercicios</a></li>
	     	<li class="inline-block-top"><a href="#">Perfil</a></li>
	     	<li class="inline-block-top"><a href="#">Salir</a></li>
	    </ul>
	</nav>
	<div id="perfil">Bienvenido: Usuario</div>	
	</header>
	