<?php 

	$img = $_POST['img'];

	//Guardado de Imagen

	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);

	$data = base64_decode($img);

	$fp = fopen("../sources/posts/postAct.txt", "r");
	$idP = fgets($fp);
	$newIdP = (int)$idP + 1;
	fclose($fp);

	$file = "../sources/posts/" . "post" . $newIdP . ".png"; //Cambiar nombre imagen
	$success = file_put_contents($file, $data);

	$fp2 = fopen("../sources/posts/postAct.txt", "w");	
	fwrite($fp2, $newIdP);
	fclose($fp2);

	// Base de datos

	date_default_timezone_set('America/Mexico_City');
	$Date = date('Y-m-d H:i:s');

	$con = new mysqli('localhost','root','','animapp');

	$query = "INSERT INTO post VALUES($newIdP, '$Date', 0, 'post" . $newIdP . ".png')";

	if($con->query($query))
	{
		/*
		echo'<script type="text/javascript">
        alert("¡Post Publicado!");
        window.location.href="../animapp.html";
        </script>';
        */
	}
	else
	{
		echo $con->error . "<br />";
	}

	$query2 = "INSERT INTO usuariospost VALUES('', 1, $newIdP, 1)";

	if($con->query($query2))
	{

		echo'<script type="text/javascript">
        alert("¡Post Publicado!");
        window.location.href="../animapp.html";
        </script>';
        
	}
	else
	{
		echo $con->error . "<br />";
	}

	//header('Location: ../animapp.html');

	//$fp = fopen("../sources/image.jpg", "w");
	//fwrite($fp, $data);
	//fclose($fp);

	//$upload_dir = somehow_get_upload_dir();  //implement this function yourself
//$img = $_POST['my_hidden'];
 ?>