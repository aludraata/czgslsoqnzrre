<!DOCTYPE html>
<html>
<head>
<?php
$id = $_GET['id'];
session_start();
die($_SESSION['idAdmin']);
if(!isset($_SESSION['idAdmin']) || $_SESSION['idAdmin'] != $id){
	session_destroy();
	header('Location: /compusoftware/admin');
}
?>

	<title></title>
</head>
<body>
<form id="cadastroUsuario">
	<input type="text" placeholder="login" name="logon"><br>
	<input type="password" name="senha" id="senha" placeholder="Senha"><br>
	<input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Repita a senha"><br>
	<input type="text" name="nome" placeholder="Nome"><br>
	<input type="hidden" name="acao" value="cadastraUsuario">
	<input type="submit">
</form>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#cadastroUsuario").submit(function(e){
			e.preventDefault();
			var senha = $("#senha").val();
			var confirmaSenha = $("#confirmaSenha").val();
		if(senha == confirmaSenha){
				$.post({
					url:"/compusoftware/main.php",
					dataType:"json",
					data: $(this).serialize(),
					success:function(data){
						if(data.status == "sucesso"){
							alert('usuario inserido com sucesso');
							$("#cadastroUsuario").trigger("reset");
						}
					}

				});
			}else{
				alert('As senhas não batem.');
			}
		});
	});
</script>
</body>
</html>