<?php 

	$conexion = new mysqli('localhost','root','','animapp');
	
	$idU = $_GET['idU'];

	$query3 = "SELECT idUsuario, nombre, apellidos, username FROM usuario WHERE username != '$idU'";
	$respuesta5 = $conexion->query($query3);
	
	$arreglo = array();

	while($col = $respuesta5->fetch_object()) 
	{
		array_push($arreglo, array(
			"id"=>$col->idUsuario,
			"username"=> $col->username,
			"nombre"=> $col->nombre . ' ' . $col->apellidos
		));
	}
	echo json_encode($arreglo);

 ?>