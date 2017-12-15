<?php 	

	$idP = $_GET['idP'];

	$query = "DELETE FROM usuariospost WHERE idPost = $idP";
	$con = new mysqli('localhost','root','','animapp');

	$query2 = "DELETE FROM likepost WHERE idPost = $idP";
	$query4 = "DELETE FROM comentario WHERE idPost = $idP";
	$query3 = "DELETE FROM post WHERE idPost = $idP";

	$con->query($query);
	$con->query($query2);
	$con->query($query4);

	if($con->query($query3))
	{
		echo'<script type="text/javascript">
        alert("¡Post Eliminado!");
        window.location.href="../index.html";
        </script>';	
	}
	else
	{
		echo $con->error . "<br />";
	}

 ?>