<!DOCTYPE html>
<html>
<head>
<?php
$id = $_GET['idAdmin'];
$idImagem = $_GET['idImagem'];
session_start();
if(!isset($_SESSION['idAdmin']) || $_SESSION['idAdmin'] != $id){
	session_destroy();
	header('Location: /compusoftware/login');
}
?>
	<title></title>
</head>
<body>

<form id="formImagem">
	<label for="nome">Nome</label><br>
	<input type="text" name="nome" id="nome"><br>
	<img src="" id="imagem"><br>
	<label for="categorias">Categorias</label><br>
	<select id="categorias" nome="categorias">
		
	</select>
	<br>
	<label for="ativo">Ativo</label><br>
	<select id="ativo" nome="ativo">
		<option value=1>Sim</option>
		<option value=0>Não</option>
	</select><br><br>

<input type="submit">	
</form>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function(){
	$.post({
		url:"/compusoftware/main.php",
		dataType:"json",
		data:{
			id:"<?php echo $idImagem;?>",
			acao: "mostraImagem"
		},
		success:function(data){
			$("#imagem").attr("src","/compusoftware/imagens/"+data.caminho_imagem);
			$("#nome").val(data.nome_imagem);
			$("#categorias").append("<option value='"+data.id_categoria_imagem+"' selected>"+data.nome_categoria+"</option>");


		}
	});

	$.post({
		url:"/compusoftware/main.php",
		dataType:"json",
		data:{
			acao:"listaCategorias"
		},
		success:function(data){
			$.each(data,function(){
				$("#categorias").append("<option value="+this.id+"> "+this.nome+"</option>");
			});
		}
	});

	$("#formImagem").submit(function(e){
		e.preventDefault();
		var idCategoria = $("#categorias").val();
		var ativo = $("#ativo").val();
		var nome = $("#nome").val();
		$.post({
			url:"/compusoftware/main.php",
			dataType:"json",
			data:{
				acao:"atualizaImagem",
				categorias:idCategoria,
				nome:nome,
				ativo:ativo,
				idImagem:"<?php echo $idImagem;?>"
			},
			success: function(){
				alert("Dados atualizados com sucesso!");
			}
		});
	});


});

</script>
</body>
</html>