<?php 
	date_default_timezone_set('America/Mexico_City');

	$Nombre = $_POST['n'];
	$Apellidos = $_POST['a'];
	$Username = $_POST['u'];
	$Email = $_POST['e'];
	$Pass = $_POST['p'];
	$Date = date('Y-m-d');

	$con = new mysqli('localhost','root','','animapp');

	$query = "INSERT INTO usuario(nombre, apellidos, username, email, pass, fechaRegistro) VALUES('$Nombre', '$Apellidos', '$Username', '$Email', '$Pass', '$Date')";

	if($con->query($query))
	{
		echo'<script type="text/javascript">
        alert("¡Usuario Registrado Correctamente!");
        window.location.href="../index.html";
        </script>';
	}
	else
	{
		echo $con->error . "<br />";
	}

 ?>