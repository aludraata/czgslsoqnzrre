
<?php
    $id = $_GET['idAdmin'];
    $idCategoria = $_GET['idCategoria'];
	session_start();
	if(!isset($_SESSION['idAdmin']) || $_SESSION['idAdmin'] != $id){
		session_destroy();
		header('Location: /compusoftware/admin');
	}
	
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Cadastro de categorias - CompuSoftware</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../../assets/css/admin.css">
  </head>
  <body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="painel.html">Cadastro de categoria</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
	<li class="nav-item active">
		<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Link</a>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Editar
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="cadastrar/<?php echo $id;?>">Cadastrar</a>
			<a class="dropdown-item" href="../../lista/<?php echo $id;?>">Editar</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="../../../<?php echo $id;?>">Menu Principal</a>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link disabled" href="#">Disabled</a>
	</li>
</ul>

<ul class="navbar-nav mr-sm-3">
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span id="nome-adm"></span>
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="#">Meus Dados</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#">Sair</a>
		</div>
	</li>
</ul>
</div>
</nav>

	<div class="container-fluid admin-logo" style="height: 100%;">
		<div class="row">
			<div class="col-md-12">
            <div class="container" style="padding-top:80px; ">
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertSuccess" style="display:none;">
                <strong>Categoria editada com sucesso.</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
             </div>
             <div class="alert alert-primary alert-dismissible fade show" role="alert" id="alert" style="display:none;">
                <strong>O campo é obrigatório.</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
             </div>

         <form id="editCategoria">
		  <div class="form-group">

        <div class="form-group">
          <label for="categoria">Categoria</label>
          <input type="input" class="form-control" id="categoria" name="categoria" placeholder="Categoria">
       
        </div>
		  </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" id="status" name="status">
            <option value=1>Ativo</option>
            <option value=0>Inativo</option>
          </select>        
        </div>
        <input type="submit" class="btn btn-success" value="Editar">
		  </div>

		</form>


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
				$.ajax({
					url:"../../../../main.php",
					type:"POST",
					dataType:"json",
					data:{
						acao:"showUsuario",
						idUsuario:<?php echo $id;?>
					},
					success:function(data){
						$("#nome-adm").append(data.nome);
						//alert(data.nome);

					}	
				});

                $.ajax({
                    url:"../../../../main.php",
                    type:"POST",
                    dataType:"json",
                    data:{
                        acao:"mostraCategoria",
                        idCategoria:<?php echo $idCategoria;?>
                    },
                    success:function(data){
                        $("#categoria").val(data.nome);
                    }   
                });

                $("#editCategoria").on("submit",function(e){
                    e.preventDefault();
                    var dados = new FormData($('#editCategoria')[0]);
                    dados.append('acao','editarCategoria');
                    dados.append('idCategoria',<?php echo $idCategoria;?>);
                if($("#categoria").val() != ""){
                    $.ajax({
                        url:"../../../../main.php",
                        type:"POST",
                        dataType:"json",
                        processData: false,
                        contentType: false,
                        data:dados,
                        success:function(data){
                            if(data.status == "sucesso"){
                                $("#alertSuccess").show();
                            }
                        }

                    });
                }else{
                    $("#alert").show();
                }
                });
			});
		</script>
  </body>
</html>
