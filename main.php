<?php
	require_once("classes/Admin.php");

	

	$acao = $_POST['acao'];

	if($acao == 'login'){
		$admin = new Admin();

		$login = $_POST['usuario'];
		$senha = $_POST['senha'];

		

		if($admin->login($login,$senha)){
			$loginArray = array('status' => 'aprovado');

			echo json_encode($loginArray);
		}else{
			$loginArray = array('status' => 'recusado');

			echo json_encode($loginArray);
		}
	}
?>