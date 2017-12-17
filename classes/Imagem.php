<?php
require_once('CRUD.php');

class Imagem extends CRUD{
	protected $tabela = "imagem";

	private $id_imagem;
	private $id_categoria_imagem;
	private $caminho_imagem;
	private $nome_imagem; 
	private $data_cadastro_imagem;
	private $ativo_imagem;

	public function insert(){
		$sql = "INSERT INTO $this->tabela(id_categoria_imagem,caminho_imagem,nome_imagem) VALUES(:id_categoria_imagem,:caminho_imagem,:nome_imagem)";

		$stmt = BD::prepare($sql);
		$stmt->bindParam(':id_categoria_imagem',$this->id_categoria_imagem);
		$stmt->bindParam(':caminho_imagem',$this->caminho_imagem);
		$stmt->bindParam(':nome_imagem',$this->nome_imagem);

		return $stmt->execute();

	}

	public function update($id){

		$sql = "UPDATE $this->tabela SET id_categoria_imagem = :id_categoria_imagem, nome_imagem = :nome_imagem, ativo_imagem = :ativo_imagem where id_imagem = :id";

		$stmt = BD::prepare($sql);
		$stmt->bindParam(':id_categoria_imagem',$this->id_categoria_imagem);
		$stmt->bindParam(':nome_imagem',$this->nome_imagem);
		$stmt->bindParam(':ativo_imagem',$this->ativo_imagem);
		$stmt->bindParam(':id',$id);

		return $stmt->execute();
	}

	public function selecionaTudo(){
		$sql = "SELECT * FROM $this->tabela";

		$stmt = BD::prepare($sql);
		$stmt->execute();

		$resultado = $stmt->fetchAll();

		$resultadoJson = [];

		foreach ($resultado as $valor) {
			$resultadoJsonAux = array("id"=>$valor->id_imagem,
									 "nome"=>$valor->nome_imagem,
									 "caminho"=>$valor->caminho_imagem);

			array_push($resultadoJson, $resultadoJsonAux);
		}

		return json_encode($resultadoJson);
	}

	public function seleciona($id){
		$sql = "SELECT * FROM $this->tabela INNER JOIN imagem_categoria ON(id_categoria_imagem = id_imagem_categoria AND NOT ativo_categoria = 0 AND NOT ativo_imagem = 0) WHERE id_imagem = :id
";
		$stmt = BD::prepare($sql);

		$stmt->bindParam(':id',$id);

		$stmt->execute();

		$resultado = $stmt->fetch();

		$resultadoJson = array(	"id_imagem" 			=> $resultado->id_imagem,
								"id_categoria_imagem" 	=> $resultado->id_categoria_imagem,
								"caminho_imagem" 		=> $resultado->caminho_imagem,
								"nome_imagem" 			=> $resultado->nome_imagem,
								"data_cadastro_imagem" 	=> $resultado->data_cadastro_imagem,
								"nome_categoria" 		=> $resultado->nome_categoria);

		return json_encode($resultadoJson);
	}


	public function setCaminho($caminho){
		$this->caminho_imagem = $caminho;
	}

	public function setIdCategoria($IdCategoria){
		$this->id_categoria_imagem = $IdCategoria;
	}

	public function setNome($nome){
		$this->nome_imagem = $nome;
	}

	public function setAtivo($ativo){
		$this->ativo_imagem = $ativo;
	}
}

?>