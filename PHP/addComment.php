<?php 

	require('conexion.php');
	
	$user = $_GET['un'];
	$pId = $_GET['ps'];
	$com = $_GET['com'];

	date_default_timezone_set('America/Mexico_City');
	$Date = date('Y-m-d');

	$query3 = "SELECT idUsuario FROM usuario WHERE username = '" . $user ."'";
	$respuesta5 = $con->query($query3);
	$idAct = $respuesta5->fetch_array();

	$query = "INSERT INTO comentario(idUsuarioD, idPost, comentario, fechaPublic) VALUES(" . $idAct[0] .", " . $pId . ", '" . $com . "', '" . $Date . "')";

	$con->query($query);

 ?>