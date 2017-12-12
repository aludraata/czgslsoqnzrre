<?php
	require_once("classes/Admin.php");
	require_once("classes/Usuario.php");
	

	$acao = $_POST['acao'];

	if($acao == 'login'){
		$admin = new Admin();

		$login = $_POST['usuario'];
		$senha = $_POST['senha'];

		echo $admin->login($login,$senha);

		
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

	}
?>