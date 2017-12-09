<?php
	$conexion = new mysqli('localhost','root','','animapp');
	
	$idU = $_GET['idU'];
	$query2 = "SELECT idUsuario FROM usuario WHERE username = '$idU'";
	$respuesta4 = $conexion->query($query2);
	$id = $respuesta4->fetch_array();

	$posts = "SELECT * FROM post";
	$respuesta = $conexion->query($posts);
	$arreglo = array();
	while($post = $respuesta->fetch_object()) {
		$autor = "SELECT u.nombre, u.apellidos, u.username FROM usuario u, usuariospost up WHERE u.idUsuario = up.idUsuario AND up.idPost = $post->idPost";
		$respuesta2 = $conexion->query($autor);
		$nombre = $respuesta2->fetch_object();
		$likes = "SELECT idUsuario FROM likePost WHERE idPost = $post->idPost";
		$respuesta3 = $conexion->query($likes);
		//$like = $respuesta3->fetch_array();



		$likeBool = 0;		
		 while($row = $respuesta3->fetch_assoc()) {
		 	if ($row['idUsuario'] == $id[0])
		 	{
		 		$likeBool = 1;
		 	}
		 }

		//if ($like == null) { $like = 0; }
		array_push($arreglo, array(
			"id"=>$post->idPost,
			"fecha"=>$post->fechaPost,
			"likes"=>$post->numLikes,
			"dibujo"=>$post->dibujo,
			"likes"=>mysqli_num_rows($respuesta3),
			"nombre"=> $nombre->nombre . ' ' . $nombre->apellidos,
			"username" => $nombre->username,
			"likeBool" => $likeBool
		));
	}
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);
?>