<?php 

	require('conexion.php');
	
	$idP = $_GET['idP'];

	$comments = "SELECT * FROM comentario WHERE idPost = $idP";
	$respuesta = $con->query($comments);
	$arreglo = array();
	
	
	while($comment = $respuesta->fetch_assoc()) 
	{
		$user = "SELECT nombre, apellidos, count(*) FROM usuario WHERE idUsuario = " . $comment['idUsuarioD'];
		$respuesta2 = $con->query($user);
		$name = $respuesta2->fetch_array();

		array_push($arreglo, array(
			'idCom'=>$comment['idComentario'],
			'idUsua'=>$comment['idUsuarioD'],
			'comentario'=>utf8_encode($comment['comentario']),
			'fechaP'=>$comment['fechaPublic'],
			'nombre'=> $name[0] . ' ' . $name[1]
		));
	}

	echo json_encode($arreglo);

 ?>