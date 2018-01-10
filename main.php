<?php
	require_once("classes/Admin.php");
	require_once("classes/Usuario.php");
	require_once("classes/Imagem.php");
	require_once("classes/Categoria.php");

	$acao = $_POST['acao'];

	if($acao == 'login'){
		$usuario = new Usuario();

		$login = $_POST['usuario'];
		$senha = $_POST['senha'];

		echo $usuario->login($login,$senha);

		
	}elseif($acao == 'cadastraUsuario'){
		$usuario = new Usuario();

		$logon 	= $_POST['logon'];
		$senha 	= $_POST['senha'];
		$nome 	= $_POST['nome'];

		$usuario->setLogin($logon);
		$usuario->setSenha($senha);
		$usuario->setNome($nome);

		$usuario->insert();

		echo json_encode(array('status' => 'sucesso'));
	}elseif($acao == 'listagemUsuarios'){
		$usuario = new Usuario();

		echo $usuario->selecionaTodos();
	}elseif($acao == 'showUsuario'){
		$usuario = new Usuario();
		$id = $_POST['idUsuario'];

		echo $usuario->seleciona($id);
	}elseif($acao == 'editarUsuario'){
		$usuario = new Usuario();

		$login 	= 	$_POST['logon'];
		$nome  	= 	$_POST['nome'];
		$id 	= 	$_POST['idUsuario'];
		$ativo	=	$_POST['ativo'];

		$usuario->setLogin($login);
		$usuario->setNome($nome);
		$usuario->setAtivo($ativo);
		
		if($usuario->update($id)){
			echo json_encode(array("status" => "sucesso"));
		}else{
			echo json_encode(array("status" => "fracasso"));
		}
	}elseif($acao == "deletarUsuario"){
		$usuario = new Usuario();


		$id 	= 	$_POST['idUsuario'];
		
		if($usuario->delete($id)){
			echo json_encode(array("status" => "sucesso"));
		}else{
			echo json_encode(array("status" => "fracasso"));
		}

	}elseif($acao == 'cadastrarImagem'){
		date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

		$ext = strtolower(substr($_FILES['foto']['name'],-4)); //Pegando extensão do arquivo
		$new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
		$dir = 'imagens/'; //Diretório para uploads

		move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

		$imagem = new Imagem();

		$idCategoria 	= $_POST['idCategoria'];
		$nome 			= $_POST['nome'];
		$caminho = $new_name;

		$imagem->setIdCategoria($idCategoria);
		$imagem->setCaminho($caminho);
		$imagem->setNome($nome);

		if($imagem->insert()){
			echo json_encode(array("status" => "sucesso"));
		}else{
			echo json_encode(array("status" => "fracasso"));
		}
	}elseif($acao == "listaImagens"){
		$imagem = new Imagem();
		echo $imagem->selecionaTudo();
	}elseif($acao == "mostraImagem"){
		$imagem = new Imagem();
		$id = $_POST['id'];

		echo $imagem->seleciona($id);
	}elseif($acao == "listaCategorias"){
		$categoria = new Categoria();

		echo $categoria->selecionaTudo();
	}elseif($acao == "atualizaImagem"){
		$imagem = new Imagem();

		$nome 			= $_POST['nome'];
		$idCategoria 	= $_POST['categorias'];
		$ativo 			= $_POST['ativo'];
		$idImagem		= $_POST['idImagem'];

		$imagem->setNome($nome);
		$imagem->setIdCategoria($idCategoria);
		$imagem->setAtivo($ativo);

		$imagem->update($idImagem);
	}elseif($acao=="cadastraCategoria"){
		$categoria = new Categoria();

		$nome = $_POST['categoria'];

		$categoria->setNomeCategoria($nome);

		echo $categoria->insert();
	}elseif($acao == "mostraCategoria"){
		$idCategoria = $_POST['idCategoria'];

		$categoria = new Categoria();

		echo $categoria->seleciona($idCategoria);
	}elseif($acao=="editarCategoria"){
		$categoria = new Categoria();

		$nomeCategoria = $_POST['categoria'];
		$ativoCategoria = $_POST['status'];
		$id =$_POST['idCategoria'];

		$categoria->setNomeCategoria($nomeCategoria);
		$categoria->setAtivoCategoria($ativoCategoria);

		echo $categoria->update($id);
	}
?>