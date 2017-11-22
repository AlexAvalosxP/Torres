<?php 

	$Username = $_POST['u'];
	$Pass = $_POST['p'];

	$con = new mysqli('localhost','root','','animapp');

	$query = "SELECT pass FROM usuario WHERE username = '$Username'";

	$PassQuery = $con->query($query);

	$r = mysqli_num_rows($PassQuery);

	if($r > 0)
	{
		if ($Pass == $PassQuery->fetch_object()->pass)
		{
			header("location: ../animapp.html");
		}
		else
		{
			echo'<script type="text/javascript">
			window.location.href="../index.html";
        	alert("Contraseña Incorrecta");
        	</script>';
		}
	}
	else
	{
		echo'<script type="text/javascript">
		window.location.href="../index.html";
        alert("El Usuario no existe");
        </script>';
	}

 ?>