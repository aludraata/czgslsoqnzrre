<?php
	require_once('CRUD.php');
	class Usuario extends CRUD{
		
		protected $tabela = 'usuario';

		private $logon_usuario;
		private $senha_usuario;
		private $nome_usuario;
		private $data_cadastro_usuario;
		private $ativo_usuario;

		public function insert(){
			$sql = "INSERT INTO $this->tabela(logon_usuario,senha_usuario,nome_usuario) VALUES(:logon_usuario,:senha_usuario,:nome_usuario)";
			$stmt = BD::prepare($sql);
			$stmt->bindParam(':logon_usuario',$this->logon_usuario);
			$stmt->bindParam(':senha_usuario',$this->senha_usuario);
			$stmt->bindParam(':nome_usuario',$this->nome_usuario);
	
			return $stmt->execute();
		}

		public function update($id){
			$sql = "UPDATE $this->tabela SET logon_usuario = :logon_usuario, nome_usuario = :nome_usuario, ativo_usuario = :ativo_usuario WHERE id_usuario = :id";

			$stmt = BD::prepare($sql);
			$stmt->bindParam(':logon_usuario',$this->logon_usuario);
			$stmt->bindParam(':nome_usuario',$this->nome_usuario);
			$stmt->bindParam(':ativo_usuario',$this->ativo_usuario);
			$stmt->bindParam(':id',$id);

			return $stmt->execute();

		}


		public function login($login,$senha){
			$sql = "SELECT * FROM $this->tabela WHERE logon_usuario = :logon_usuario";
			$stmt = BD::prepare($sql);
			$stmt->bindParam(':logon_usuario',$login);
			
			
			$stmt->execute();

			$resultado = $stmt->fetch();
			if($resultado->ativo_usuario != 1){
				$resultadoJson = array("status" => "fracasso");
			}
			if(is_null($resultado) or empty($resultado)){
				$resultadoJson = array("status" => "fracasso");
			}else{
				$senhaBanco = $resultado->senha_usuario;

				if(password_verify($senha,$senhaBanco)){
					session_start();
					$_SESSION['idAdmin'] = $resultado->id_usuario;
					$resultadoJson = array("status" => "sucesso",
											"id"	=> $resultado->id_usuario);
				}else{
					$resultadoJson = array("status" => "fracasso");
				}
			}

			return json_encode($resultadoJson);
		}

		public function selecionaTodos(){

			$sql = "SELECT * FROM $this->tabela";
			$stmt = BD::prepare($sql);
			$stmt->execute();

			$resultado = $stmt->fetchAll();
			$resultadoJson = [];

			Foreach($resultado as $valor){
				
				$resultadoJsonAux = array(
					'id' 					=> $valor->id_usuario,
					'logon' 				=> $valor->logon_usuario,
					'senha' 				=> $valor->senha_usuario,
					'nome' 					=> $valor->nome_usuario,
					'data' 					=> $valor->data_cadastro_usuario,
					'ativo' 				=> $valor->ativo_usuario );
				array_push($resultadoJson,$resultadoJsonAux);
			}

			
			return json_encode($resultadoJson);

		}

		public function seleciona($id){
			$sql = "SELECT * FROM $this->tabela WHERE id_usuario = :id";
			$stmt = BD::prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->execute();

			$resultado = $stmt->fetch();

			$resultadoJson = array(
				'id' 					=> $resultado->id_usuario,
				'logon' 				=> $resultado->logon_usuario,
				'senha' 				=> $resultado->senha_usuario,
				'nome' 					=> $resultado->nome_usuario,
				'data'			 		=> $resultado->data_cadastro_usuario,
				'ativo' 				=> $resultado->ativo_usuario );

			return json_encode($resultadoJson);
		}

		public function setLogin($logon_usuario){
			$this->logon_usuario =$logon_usuario;
		}

		public function setSenha($senha_usuario){
			$this->senha_usuario = password_hash($senha_usuario,PASSWORD_DEFAULT);
		}

		public function setNome($nome_usuario){
			$this->nome_usuario = $nome_usuario;
		}

		public function setData($data_cadastro_usuario){
			$this->data_cadastro_usuario = $data_cadastro_usuario;
		}

		public function setAtivo($ativo_usuario){
			$this->ativo_usuario = $ativo_usuario;
		}


	}
?>