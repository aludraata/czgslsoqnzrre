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

<ul id="listaImagens">
	
</ul>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function(){
	$.post({
		url:"/compusoftware/main.php",
		dataType:"json",
		data:{
			acao:"listaImagens"
		},		
		success:function(data){
			$.each(data,function(){
				var nomeUrl = this.nome .toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
				$("#listaImagens").append("<li> <a href=/compusoftware/editar/imagem/<?php echo $id;?>/"+this.id+"/"+nomeUrl+">"+this.nome+"</a></li>");
			});
		}

	});
});	

</script>

</body>
</html>