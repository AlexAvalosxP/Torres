<?php 

	$idP = $_GET['idPost'];
	$idU = $_GET['idUser'];

	require('conexion.php');

	$query2 = "SELECT idUsuario FROM usuario WHERE username = '$idU'";
	$respuesta = $con->query($query2);
	$id = $respuesta->fetch_array();

	echo $id[0];
	echo $idP;

	$query = "INSERT INTO likepost(idUsuario, idPost) VALUES(" . $id[0] . ", " . $idP .")";

	if($con->query($query))
	{

	}
	else
	{
		echo $con->error . "<br />";
	}

 ?>