<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Confirmación de Registro</title>
	
</head>
<body>
	<div class="message warning" >
			<form name="form_activate" action="<?= base_url().'LoginController/change_pass'?>" method="POST">
			<li>
				<input type="text" name="user" class="text" placeholder="Código de Activación">
				<label class=" icon user"></label>
			</li>
				<div class="clear"> </div>
			<li>
				<input type="password" name="pass" placeholder="Nueva Contraseña">
				<label class="icon lock"></label>
			</li>
			<div class="clear"> 
				<?php echo $this->session->flashdata('mensaje');?>
			</div>
			<div class="submit">
				<input type="submit" value="Cambiar Contraseña" name="submit">
				<div class="clear"> </div>	
			</div>
		</form>

	</div>	
</body>
</html>