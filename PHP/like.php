<?php 

	$idP = $_GET['idPost'];
	$idU = $_GET['idUser'];

	$con = new mysqli('localhost','root','','animapp');

	$query2 = "SELECT idUsuario FROM usuario WHERE username = '$idU'";
	$respuesta = $con->query($query2);
	$id = $respuesta->fetch_array();

	echo $id[0];
	echo $idP;

	$query = "INSERT INTO likepost VALUES('', $id[0], $idP)";

	if($con->query($query))
	{

	}
	else
	{
		echo $con->error . "<br />";
	}

 ?>