<html>
<head>
	<title>Pagina Principal</title>
</head>
<body>
	<h1>BIENVENIDO AL CURSO DE LISTAS SIMPLES</h1>
	<h3>USUARIO: <?= $usuariosession;?></h3>

	<a href="<?= base_url().'index.php/LoginController/close_session'?>">Cerrar Sesión</a>
</body>
</html>