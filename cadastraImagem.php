<!DOCTYPE html>
<html>
<head>
<?php
 	session_start();
	$id = $_GET['id'];
	if(!isset($_SESSION['idAdmin']) || $_SESSION['idAdmin'] != $id){
		if(!isset($_SESSION['idUsuario']) || $_SESSION['idUsuario'] != $id){
			session_destroy();
			header('Location: /compusoftware/login');
		}

		
	}

?>
	<title></title>
</head>
<body>

</body>
</html>