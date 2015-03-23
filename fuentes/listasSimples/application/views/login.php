<html>
<head>
	<title>Inicio de Sesión</title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
</head>
<body>




<div class="message warning" >
		<form name="form_iniciar" action="<?= base_url().'index.php/LoginController/very_session'?>" method="POST">
			<li>
				<input type="text" name="user" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Usuario';}"><label class=" icon user"></label>
			</li>
				<div class="clear"> </div>
			<li>
				<input type="password" name="pass" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Contraseña';}"> <label class=" icon lock"></label>
			</li>
			<div class="clear"> 
				<?php if(isset($mensaje)):?>
				<h2><?= $mensaje;?></h2>
				<?php endif;?>
			</div>
			<div class="submit">
				<input type="submit" value="Iniciar Sesión" name="submit" >
						  <div class="clear"> </div>	
			</div>
				
		</form>
</div>	


</body>
</html>