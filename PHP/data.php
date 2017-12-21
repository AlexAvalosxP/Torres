<?php 
	
	require('conexion.php');
	
	$user = $_GET['username'];
	$query3 = "SELECT idUsuario FROM usuario WHERE username = '$user'";
	$respuesta5 = $con->query($query3);
	$id = $respuesta5->fetch_array();

	$postss = "SELECT * FROM post p, usuariospost u WHERE p.idPost = u.idPost AND u.idUsuario = " . $id[0];
	$respuesta9 = $con->query($postss);
	$numPosts = $respuesta9->fetch_array();

	$idAct = $_GET['idAct'];
	$query2 = "SELECT idUsuario FROM usuario WHERE username = '$idAct'";
	$respuesta4 = $con->query($query2);
	$id2 = $respuesta4->fetch_array();

	$query = "SELECT * FROM follow WHERE idUsuarioD = " . $id2[0] . " AND idUsuarioR = " . $id[0];
	$respuesta3 = $con->query($query);
	$follow = $respuesta3->fetch_array();

	$followBool = false;
	if(mysqli_num_rows($respuesta3) > 0)
	{
		$followBool = true;
	}

	$queryx = "SELECT * FROM follow WHERE idUsuarioR = " . $id[0];
	$respuestax = $con->query($queryx);
	$followNum = $respuestax->fetch_array();

	echo json_encode(array(
		'numPosts' => mysqli_num_rows($respuesta9),
		'follow' => $followBool,
		'numFollow' => mysqli_num_rows($respuestax)
		));

 ?>