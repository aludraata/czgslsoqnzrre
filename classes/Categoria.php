<?php
	require_once('CRUD.php');

	class Categoria extends CRUD{
		protected $tabela = 'imagem_categoria';

		private $id_imagem_categoria;
		private $nome_categoria;
		private $data_cadastro_categoria;
		private $ativo_categoria;

		public function insert(){
			$sql = "INSERT INTO $this->tabela(nome_categoria) VALUES(:nome_categoria)";
			
			$stmt = BD::prepare($sql);

			$stmt->bindParam(':nome_categoria',$this->nome_categoria);

			if($stmt->execute()){
				return json_encode(array("status" => "sucesso"));
			}else{
				return json_encode(array("status" => "fracasso"));
			}
		}

		public function update($id){
			$sql = "UPDATE $this->tabela SET nome_categoria = :nome_categoria, ativo_categoria = :ativo_categoria WHERE id_imagem_categoria = :id";

			$stmt = BD::prepare($sql);

			$stmt->bindParam(':ativo_categoria',$this->ativo_categoria);
			$stmt->bindParam(':nome_categoria', $this->nome_categoria);
			$stmt->bindParam(':id',				$this->id);

			if($stmt->execute()){
				return json_encode(array("status" => "sucesso"));
			}else{
				return json_encode(array("status" => "fracasso"));
			}
		}

		public function selecionaTudo(){
			$sql = "SELECT * FROM $this->tabela WHERE ativo_categoria = 1";

			$stmt = BD::prepare($sql);

			$stmt->execute();

			$resultado = $stmt->fetchAll();
			$resultadoJson = [];

			foreach($resultado as $valor){
				$resultadoJsonAux = array("id" => $valor->id_imagem_categoria,
										  "nome" => $valor->nome_categoria,
										  "data" => $valor->data_cadastro_categoria,
										  "ativo" => $valor->ativo_categoria);

				array_push($resultadoJson, $resultadoJsonAux);
			}	


			return json_encode($resultadoJson);

		}

		public function seleciona($id){
			$sql = "SELECT * FROM $this->tabela WHERE id_imagem_categoria = :id_imagem_categoria AND ativo_categoria = 1";

			$stmt = BD::prepare($sql);

			$stmt->bindParam(':id_imagem_categoria',$id);

			$stmt->execute();

			$resultado = $stmt->fetch();

			$resultadoJson = array(		  "id"	 	 => $resultado->id_imagem_categoria,
										  "nome" 	 => $resultado->nome_categoria,
										  "data"	 => $resultado->data_cadastro_categoria,
										  "ativo"	 => $resultado->ativo_categoria);

			return json_encode($resultadoJson);
		}	

	}
?>