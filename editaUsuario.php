<!DOCTYPE html>
<html>
<head>
<?php

$id = $_GET['idAdmin'];
$idUsuario = $_GET['idUsuario'];
session_start();
if(!isset($_SESSION['idAdmin']) || $_SESSION['idAdmin'] != $id){
	session_destroy();
	header('Location: /compusoftware/login');
}
?>

	<title></title>
</head>
<body>
<form id="editaUsuario">
	<input type="text" placeholder="login" name="logon" id="login"><br>
	<input type="text" name="nome" placeholder="Nome" id="nome"><br>
	<input type="hidden" name="acao" value="editarUsuario">
	<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $idUsuario;?>"> 
	<input type="hidden" name="idAdmin" id="idAdmin" value="<?php echo $idAdmin;?>">
	<label for="usuarioAtivo">Status</label>
	<select id="usuarioAtivo" name="ativo">
		<option value=1>Ativo</option>
		<option value=0>Inativo</option>
	</select><br>
	<input type="submit">
</form>
<button id="deletaUsuario">Deletar</button>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>


<script type="text/javascript">
$(document).ready(function(){
	var idUsuario = $("#idUsuario").val();

	$.post({
		url:"/compusoftware/main.php",
		dataType:"json",
		data:{
			acao: "showUsuario",
			idUsuario: idUsuario
		},
		success:function(data){
			$("#login").val(data.logon);
			$("#nome").val(data.nome);
			$("#usuarioAtivo").val(data.ativo);
		}
	});


	$("#editaUsuario").submit(function(e){
		e.preventDefault();
		$.post({
			url:"/compusoftware/main.php",
			dataType:"json",
			data:$(this).serialize(),
			success:function(){
				alert("Usuário atualizado com sucesso");
			}
		});

	});

	$("#deletaUsuario").click(function(){
		var idUsuario 	= $("#idUsuario").val();
		var idAdmin 	= $("#idAdmin").val();

		if(confirm("Deseja mesmo deletar esse registro?")){
			$.post({
				url:"/compusoftware/main.php",
				dataType:"json",
				data:{
					idUsuario: idUsuario,
					acao: "deletarUsuario"
				},
				success: function(){
					alert("usuário deletado com sucesso!");
					window.location = "/compusoftware/admin/lista/usuarios/<?php echo $id?>";
				}
			});
		}
	});
});	
</script>
</body>