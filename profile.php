<!DOCTYPE html>
<html>
<head>
	<title>AnimApp</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/funciones.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
</head>
<body>

<nav class="barra">
	<i class="fa fa-cog" aria-hidden="true" id="menu" onclick="openMenu()"></i>
	<i class="fa fa-envelope" aria-hidden="true" id="invitation" onclick="openInvitation()"></i>
	
	<i class="fa fa-pencil-square-o leftB" aria-hidden="true" onclick="draw()"></i>
	<h1 onclick="navegar('index.html')">AnimApp</h1>
</nav>
<div class="user-info">
	<div class="profile-photo"><img src="sources/user-default.jpg"></div>
	<h2 class="profile-user" id="profile-user"></h2>
	<h3 id="profile-time">Miembro desde: 19/11/2017</h3>
	<h3 id="profile-pub">Publicaciones: 1</h3>
	<h3 id="profile-followers">Seguidores: 0</h3>
</div>

<div class="button-follow" onclick="follow()"><h3>Follow</h3></div>

<section>

<section>

<div class="desplegable oculto"></div>

<input type="text" hidden value="<?php echo $_GET['u'];?>" id="id">

</body>

<script>
	window.addEventListener('load', verificarLog, true);

	id = document.getElementById('id').value;
	cargarPerfil(id);
</script>

</html>