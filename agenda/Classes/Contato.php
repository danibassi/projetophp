<?php

require_once 'Crud.php';

class Contatos extends Crud{

	protected $table = 'contatos';
	private $nome;
	private $email;
	private $celular;
	private $apelido;
	private $dtnasc;
	private $tipo;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setCelular($celular){
		$this->celular = $celular;
	}

	public function setApelido($apelido){
		$this->apelido = $apelido;
	}

	public function setDtnasc($dtnasc){
		$this->dtnasc = $dtnasc;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getCelular(){
		return $this->celular;
	}

	public function getApelido(){
		return $this->apelido;
	}
	public function getDtnasc(){
		return $this->dtnasc;
	}

	public function insert(){
		$sql  = "INSERT INTO $this->table (nome, email, celular, apelido, dtnasc, fk_tipocontato) VALUES (:nome, :email, :celular, :apelido, :dtnasc, :tipo)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':celular', $this->celular);
		$stmt->bindParam(':apelido', $this->apelido);
		$stmt->bindParam(':dtnasc', $this->dtnasc);
		$stmt->bindParam(':tipo', $this->tipo->getTipo());
		return $stmt->execute();
	}

	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome, email = :email, celular = :celular, apelido = :apelido, dtnasc = :dtnasc WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':celular', $this->celular);
		$stmt->bindParam(':apelido', $this->apelido);
		$stmt->bindParam(':dtnasc', $this->dtnasc);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}
	/*
	public function select($id){
		$contato_escolhido = new Contatos();
		foreach($meu_contato->find($id) as $key => $value){
			$contato_escolhido->setNome($value->nome);
			$contato_escolhido->setApelido($value->apelido);
			$contato_escolhido->setCelular($value->celular);
			$contato_escolhido->setEmail($value->email);
			$contato_escolhido->setDtnasc($value->dtnasc);
		}
		return $contato_escolhido;
	}
	*/
	
	public function select($id){
		$contato_escolhido = new Contatos();
		$stmt = DB::prepare("SELECT nome,apelido,email,celular,dtnasc FROM $this->table 
							 WHERE id = :id");
		$stmt->bindParam(':id', $id);
		$resultado = $stmt->execute();
		//$linha = mysql_fetch_array($resultado);
		$linha = $stmt->fetch(PDO::FETCH_ASSOC);
		$contato_escolhido->setNome($linha["nome"]);
		$contato_escolhido->setApelido($linha["apelido"]);
		$contato_escolhido->setEmail($linha["email"]);
		$contato_escolhido->setCelular($linha["celular"]);
		$contato_escolhido->setDtnasc($linha["dtnasc"]);
		return $contato_escolhido;
	}

	public function findAllCompleto(){
		$sql  = "SELECT c.id, c.nome, c.apelido, c.email, c.celular, c.dtnasc, t.tipo 
				 FROM $this->table as c 
				 INNER JOIN TipoContato as t 
				 ON c.fk_tipocontato = t.id";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
?>