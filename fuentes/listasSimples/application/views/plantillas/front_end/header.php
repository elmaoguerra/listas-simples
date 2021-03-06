<?php
$nombre = $this->session->userdata('nombre');
$grupo  = $this->session->userdata('grupo');
$codigo = $this->session->userdata('codigo');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?=$titulo;?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/normalize.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/estilo-menu.css">
	<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?autoload=true&skin=desert"></script>
	<script src="<?php echo base_url();?>js/prefixfree.min.js" type="text/javascript"></script>
	<?php 
	if(isset($js))
		echo $js;
	?>
</head>
<body>
	<header>
		<h1 class="inline-block-top"><a  href="<?php echo base_url();?>" >Listas Simplemente<br/>Enlazadas</a></h1>
		<nav id="sec-menu" class="inline-block-top">
			
        <!-- definicion de menu por medio de helper -->
        <?php echo getMenuByPerfil($grupo); ?>     
</nav>
<div id="perfil">
	<?php if($codigo): ?>
	<p class="inline-block-top">
		<!-- Bienvenid@:  -->
		<a id="nombre" href="<?php echo base_url();?>perfil">
			<?php echo  $nombre;?>
		</a>
		<a href="<?php echo base_url();?>salir">Cerrar Sesión</a>
	<?php else:?>
	<a href="<?php echo base_url();?>ingresar">Iniciar Sesión</a>
<?php endif ?>
</p>
</div>	
</header>	