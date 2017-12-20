<?php 
	
	$conexion = new mysqli('localhost','root','','animapp');
	
	$idR = $_GET['idR'];
	$query3 = "SELECT idUsuario FROM usuario WHERE username = '$idR'";
	$respuesta5 = $conexion->query($query3);
	$id = $respuesta5->fetch_array();

	$idD = $_GET['idD'];
	$query4 = "SELECT idUsuario FROM usuario WHERE username = '$idD'";
	$respuesta6 = $conexion->query($query4);
	$id2 = $respuesta6->fetch_array();

	$postss = "INSERT INTO follow VALUES('', $id2[0], $id[0])";
	if($conexion->query($postss))
	{
	
	}
	else
	{
		echo $con->error . "<br />";
	}

 ?>