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
			    <form action="" method="post">
				      <div class="form-group">
				  			<input type="email" class="form-control" id="email" placeholder="Usuário">
							</div><!-- form-group -->

				      <div class="form-group">
				  			<input type="password" class="form-control" id="senha" placeholder="Senha">
							</div><!-- form-group -->

				      <div class="form-group">
				  			<input type="submit" class="btn btn-primary btn-block" id="entrar" name="entrar" value="Entrar">
							</div><!-- form-group -->
			    </form>

				<p class="admin-login-link"><a href="#" class="btn btn-link">Esqueci minha senha.</a></p>

			  </div><!-- col-md -->
		</div><!-- row -->
  </div><!-- container-fluid -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		<script>
			//abrindo o alerta-erro-login
				//$("#alerta-erro-login").css('display', 'block');
			//fechando
				//$("#alerta-erro-login").alert('close');
		</script>
  </body>
</html>
