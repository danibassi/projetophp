<?php

class Contatos{

	protected $nome;
	protected $email;
	protected $celular;
	protected $apelido;
	protected $dtnasc;
	protected $tipo;

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
	public function getTipo(){
		return $this->tipo;
	}
}
?>