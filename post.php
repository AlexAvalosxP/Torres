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
	<i class="fa fa-bell" aria-hidden="true" id="notification" onclick="openNotification()"></i>
	<i class="fa fa-pencil-square-o leftB" aria-hidden="true" onclick="draw()"></i>
	<h1 onclick="navegar('index.html')">AnimApp</h1>
</nav>

<section>
	<div class="Post">
		<div class="info-Post">
			<img id="user-img" src="sources/user-default.jpg">
			<h2 id="user-name"></h2>
			<h3 id="pub-time"></h3>
		</div>
		<div class="img-Post">
			<img id="img" src="">
		</div>
		<div class="command-Post">
			<div class="like" id="<?php echo $_GET['id']; ?>" onclick="likePost(this.id)"><i class="fa fa-heart-o" aria-hidden="true"></i><h2 id="numlikes">200</h2><h3>¡Me Anima!</h3></div>
			<div class="comment" onclick="commentPost()"><i class="fa fa-comment-o" aria-hidden="true"></i><h2 id="numComents">1000</h2><h3>Comentar</h3></div>
		</div>

		<div class="commentsPost">
			
		</div>

	</div>
<section>

<div class="desplegable oculto"></div>

<input type="text" id="idP" value="<?php echo $_GET['id']; ?>" hidden>

</body>

<script>
	window.addEventListener('load', verificarLog, true);
	cargarPostX(document.getElementById('idP').value);
</script>

</html>