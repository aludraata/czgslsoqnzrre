<!DOCTYPE html>
<html>
<head>
<?php
session_start();
	$id = $_GET['idAdmin'];
	if(!isset($_SESSION['idAdmin']) || $_SESSION['idAdmin'] != $id){
		session_destroy();
		header('Location: /compusoftware/login');
	}
?>
	<title></title>
</head>
<body>
<input type="hidden" value="<?php echo $id;?>" id="idAdmin">
<ul id="listaUsuarios">
</ul>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function(){
	var idAdmin = $("#idAdmin").val();
	$.post({
		url:"/compusoftware/main.php",
		dataType:"json",
		data:{
			acao:"listagemUsuarios"
		},
		success: function(data){
			$.each(data,function(){
				var nomeUrl = this.nome .toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
				$("#listaUsuarios").append("<li> <a href=/compusoftware/admin/edita/usuario/"+idAdmin+"/"+this.id+"/"+nomeUrl+">"+this.nome+"</a></li>");
			});
		}
	});
});

</script>
</body>
</html>