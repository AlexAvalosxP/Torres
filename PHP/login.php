<?php 

	$Username = $_POST['u'];
	$Pass = $_POST['p'];

	require('conexion.php');

	$query = "SELECT pass, nombre, apellidos FROM usuario WHERE username = '$Username'";

	$PassQuery = $con->query($query);

	$r = mysqli_num_rows($PassQuery);

	$passTrue = 0;

	if($r > 0)
	{
		$r2 = $PassQuery->fetch_object();
		if ($Pass == $r2->pass)
		{
			$passTrue = 1;
			echo json_encode(array("pass"=>$passTrue, "nombre"=>$r2->nombre . ' ' . $r2->apellidos));
		}
		else
		{
			 echo json_encode(array("pass"=>$passTrue));

		}
	}
	else
	{
		echo json_encode(array("pass"=>$passTrue));
	}
	

 ?>