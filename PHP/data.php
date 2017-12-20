<?php 
	
	$conexion = new mysqli('localhost','root','','animapp');
	
	$user = $_GET['username'];
	$query3 = "SELECT idUsuario FROM usuario WHERE username = '$user'";
	$respuesta5 = $conexion->query($query3);
	$id = $respuesta5->fetch_array();

	$postss = "SELECT count(*) FROM post p, usuariospost u WHERE p.idPost = u.idPost AND u.idUsuario = $id[0]";
	$respuesta9 = $conexion->query($postss);
	$numPosts = $respuesta9->fetch_array();

	$idAct = $_GET['idAct'];
	$query2 = "SELECT idUsuario FROM usuario WHERE username = '$idAct'";
	$respuesta4 = $conexion->query($query2);
	$id2 = $respuesta4->fetch_array();

	$query = "SELECT count(*) FROM follow WHERE idUsuarioD = $id2[0] AND idUsuarioR = $id[0]";
	$respuesta3 = $conexion->query($query);
	$follow = $respuesta3->fetch_array();

	$followBool = false;
	if($follow[0] > 0)
	{
		$followBool = true;
	}

	$queryx = "SELECT count(*) FROM follow WHERE idUsuarioR = $id[0]";
	$respuestax = $conexion->query($queryx);
	$followNum = $respuestax->fetch_array();

	echo json_encode(array(
		'numPosts' => $numPosts[0],
		'follow' => $followBool,
		'numFollow' => $followNum[0]
		));

 ?>