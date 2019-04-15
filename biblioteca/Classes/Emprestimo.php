<?php

class Emprestimo{
    private $leitor;
    private $livro;
    private $funcionario;
    private $data;
    private $datadevolucao;
    private $dataentrega;

    public function setLeitor($leitor){
        $this->leitor = $leitor;
    }
    public function getLeitor(){
        return $this->leitor;
    }

    public function setLivro($livro){
        $this->livro = $livro;
    }
    public function getLivro(){
        return $this->livro;
    }

    public function setFuncionario($funcionario){
        $this->funcionario = $funcionario;
    }
    public function getFuncionario(){
        return $this->funcionario;
    }

    public function setData($data){
        $this->data = $data;
    }
    public function getData(){
        return $this->data;
    }

    public function setDatadevolucao($datadevolucao){
        $this->datadevolucao = $datadevolucao;
    }
    public function getDatadevoluca0(){
        return $this->datadevolucao;
    }

    public function setDataentrega($dataentrega){
        $this->dataentrega = $dataentrega;
    }
    public function getDataentrega(){
        return $this->dataentrega;
    }
}




?>