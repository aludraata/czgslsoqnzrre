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
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form id="uploadImagem" enctype="multipart/form-data">
	<input type="text" name="nome">
	<input type="hidden" name="idCategoria" value=1>
	<input type="hidden" name="acao" value="cadastrarImagem">
	<input type="file" name="foto">
	<input type="submit">
</form>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#uploadImagem").submit(function(e){
		e.preventDefault();
		

		$.post({
			url:"/compusoftware/main.php",
			data:new FormData(this),
			contentType: false, 
			cache: false,             // To unable request pages to be cached
			processData:false,       // To send DOMDocument or non processed data file it is set to false
			success:function(){
				alert("imagem cadastrada com sucesso!");
				$("#uploadImagem").trigger("reset");
			}

		});
		
	});
});

</script>
</body>
</html>
</body>
</html>