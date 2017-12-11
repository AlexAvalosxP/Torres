<?php 

	$Username = $_POST['u'];
	$Pass = $_POST['p'];

	$con = new mysqli('localhost','root','','animapp');

	$query = "SELECT pass FROM usuario WHERE username = '$Username'";

	$PassQuery = $con->query($query);

	$r = mysqli_num_rows($PassQuery);

	$passTrue = 0;

	if($r > 0)
	{
		if ($Pass == $PassQuery->fetch_object()->pass)
		{
			$passTrue = 1;
			echo json_encode(array("pass"=>$passTrue));
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