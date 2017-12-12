<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
		$id = $_GET['id'];
		if(!isset($_SESSION['idAdmin']) || $_SESSION['idAdmin'] != $id){
			session_destroy();
			header('Location: /compusoftware/login');
		}
	?>
	<title></title>
</head>
<body>
<ul>
<li><a href="cadastrar/usuario/<?php echo $id;?>">Cadastrar usuário</a> </li>
<li><a href="lista/usuarios/<?php echo $id;?>">Editar usuário</a> </li>
<li><a href="/compusoftware/cadastrar/imagem/<?php echo $id;?>">Cadastrar imagem</a></li>
</ul>
</body>
</html>