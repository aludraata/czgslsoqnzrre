<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form id="formLogin">
	<label for="usuario">Usuário</label>
	<input type="text" id="usuario">
	<label for="senha">Senha</label>
	<input type="text" id="senha" >
	<input type="submit">
</form>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("#formLogin").submit(function(e){
		e.preventDefault();

		$.post({
			url:"main.php",
			dataType:"json",
			data:{
				usuario: $("#usuario").val(),
				senha: $("#senha").val(),
				acao: "login",				
			},
			success: function(data){
				if(data.status == "aprovado"){
					window.location = "admin/"+data.id;
				}else{
					alert("usuário ou senha inválidos. tente novamente.");
				}
			}
		});
	});

});
</script>
</body>
</html>