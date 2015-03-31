<html>
<head>
	<title>Pagina Principal</title>
</head>
<body>
	<h1>BIENVENIDO AL CURSO DE LISTAS SIMPLES</h1>
	<h3>USUARIO: <?= $usuariosession;?></h3>
	<h3>GRUPO: <?= $grupousuariosession;?></h3>
	<h3>ROL: <?= $rolsession;?></h3>

	<a href="<?= base_url().'salir'?>">Cerrar Sesión</a>
</body>
</html>