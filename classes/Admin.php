<?php
	require_once('CRUD.php');
	class Admin extends CRUD{
		
		protected $tabela = 'admin';

		private $login;
		private $senha;

		public function insert(){
			$sql = "INSERT INTO $this->tabela(login,senha) VALUES(:login,:senha)";
			$stmt = BD::prepare($sql);
			$stmt->bindParam(':login',$this->login);
			$stmt->bindParam(':senha',$this->senha);

			return $stmt->execute();
		}

		public function update($id){
			return false;
		}


		public function login($login,$senha){
			$sql = "SELECT * FROM $this->tabela WHERE login = :login";
			$stmt = BD::prepare($sql);
			$stmt->bindParam(':login',$login);
			
			
			$stmt->execute();

			$resultado = $stmt->fetch();

			if(is_null($resultado) or empty($resultado)){
				return false;
			}else{
				$senhaBanco = $resultado->senha;

				if(password_verify($senha,$senhaBanco)){
					return true;
				}else{
					return false;
				}
			}
		}

		public function setLogin($login){
			$this->login = $login;
		}

		public function setSenha($senha){
			$this->senha = password_hash($senha,PASSWORD_DEFAULT);
		}

	}
?>