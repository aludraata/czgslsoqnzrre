<!doctype html>
<html lang="pt-br">
  <head>
    <title>Login - CompuSoftware</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">
  </head>
  <body>

	<div class="container-fluid admin-logo" style="height: 100%;">
		<div class="row">
			<div class="col-md-10 mx-auto align-self-center">

				<!-- mensagem erro de login -->
				<div class="alert alert-warning lert-dismissible fade show admin-login-alerta" role="alert" id="alerta-erro-login">
					Usuário ou senha incorretos. Tente novamente.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>
				</div><!-- alert -->

			</div><!-- col-md -->
		</div><!-- row -->
		<div class="row">
			  <div class="col-md-3 mx-auto align-self-center">

					<!-- logo -->
			   	<img src="../assets/img/logo.png" alt="CompuSoftware" class="rounded-circle mx-auto admin-login-logo">

					<h1 class="admin-login-tituloPagina">Painel Administrativo</h1>

					<!-- Formulário -->
			    <form action="../main.php" method="post" id="formLogin">
				      <div class="form-group">
				  			<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário">
							</div><!-- form-group -->

				      <div class="form-group">
				  			<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
							</div><!-- form-group -->

				      <div class="form-group">
				  			<input type="submit" class="btn btn-primary btn-block" id="entrar" name="entrar" value="Entrar">
							</div><!-- form-group -->
							<input type="hidden" name="acao" value="login">
			    </form>

				<p class="admin-login-link"><a href="#" class="btn btn-link">Esqueci minha senha.</a></p>

			  </div><!-- col-md -->
		</div><!-- row -->
  </div><!-- container-fluid -->

	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		<script>
			//abrindo o alerta-erro-login
				//$("#alerta-erro-login").css('display', 'block');
			//fechando
				//$("#alerta-erro-login").alert('close');
			$(document).ready(function(){
					$("#formLogin").submit(function(e){
						e.preventDefault();

						$.ajax({
							url:"../main.php",
							type:"POST",
							dataType:"json",
							data:$(this).serialize(),
							success:function(data){
								if(data.status != 'sucesso'){
									$("#alerta-erro-login").show();
								}else{
									window.location = "../dashboard/"+data.id;
								}
							}
						});
					});
			});
		</script>
  </body>
</html>
