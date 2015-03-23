<html>
<head>
	<title>Inicio de Sesión</title>

</head>
<body>

<h1>INICIO DE SESION</h1>

<?php if(isset($mensaje)):?>
<h2><?= $mensaje;?></h2>
<?php endif;?>



	<form name="form_iniciar" action="<?= base_url().'index.php/LoginController/very_session'?>" method="POST">



		<label for="usuario">Usuario</label><br />
		<input type="text" name="user"/><br /><br />

		<label for="contraseña">Contraseña</label><br />
		<input type="password" name="pass"/><br />

		<input type="submit" value="Entrar" name="submit"/>
	</form>


</body>
</html>