<html>
<head>
	<title>Pagina Principal</title>
</head>
<body>
	<h1>BIENVENIDO AL CURSO DE LISTAS SIMPLEs</h1>
	<h3>USUARIO: <?= $usuariosession;?></h3>

	<a href="<?= base_url().'LoginController/close_session'?>">Cerrar Sesión</a>
</body>
</html>