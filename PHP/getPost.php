<?php
	require('conexion.php');
	
	$idP = $_GET['idP'];

	$usernameAct = $_GET['username'];
	$query3 = "SELECT idUsuario FROM usuario WHERE username = '$usernameAct'";
	$respuesta5 = $con->query($query3);
	$idAct = $respuesta5->fetch_array();

	$posts = "SELECT p.*, up.idUsuario FROM post p, usuariospost up WHERE p.idPost = up.idPost AND p.idPost = $idP";
	$respuesta = $con->query($posts);
	$arreglo = array();
	while($post = $respuesta->fetch_object()) {
		$autor = "SELECT u.nombre, u.apellidos, u.username FROM usuario u, usuariospost up WHERE u.idUsuario = up.idUsuario AND up.idPost = $post->idPost";
		$respuesta2 = $con->query($autor);
		$nombre = $respuesta2->fetch_object();
		$likes = "SELECT idUsuario FROM likepost WHERE idPost = $post->idPost";
		$respuesta3 = $con->query($likes);
		//$like = $respuesta3->fetch_array();



		$likeBool = 0;		
		 while($row = $respuesta3->fetch_object()) {
		 	if ($row->idUsuario == $idAct[0])
		 	{
		 		$likeBool = 1;
		 	}
		 }

		 $comms = "SELECT COUNT(*) FROM comentario WHERE idPost = $post->idPost";
		$respuesta10 = $con->query($comms);
		$numComs = $respuesta10->fetch_array();

		//if ($like == null) { $like = 0; }
		array_push($arreglo, array(
			"id"=>$post->idPost,
			"fecha"=>$post->fechaPost,
			"likes"=>$post->numLikes,
			"dibujo"=>$post->dibujo,
			"likes"=>mysqli_num_rows($respuesta3),
			"nombre"=> $nombre->nombre . ' ' . $nombre->apellidos,
			"username" => $nombre->username,
			"likeBool" => $likeBool,
			"numCom" => $numComs[0]
		));
	}
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);
?>