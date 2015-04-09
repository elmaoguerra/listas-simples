<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Inicio de Sesión</title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
</head>
<body>
	<div class="message warning" >
		<form name="form_iniciar" action="<?= base_url().'LoginController/very_session'?>" method="POST">
			<li>
				<input type="text" name="user" class="text" placeholder="Código     ej. 20152078015">
				<label class=" icon user"></label>
			</li>
				<div class="clear"> </div>
			<li>
				<input type="password" name="pass" placeholder="Contraseña">
				<label class="icon lock"></label>
			</li>
			<div class="clear"> 
				<?php echo $this->session->flashdata('mensaje');?>
			</div>
			<div class="submit">
				<input type="submit" value="Iniciar Sesión" name="submit">
				<div class="clear"> </div>	
			</div>
		</form>
	</div>	
</body>
</html>