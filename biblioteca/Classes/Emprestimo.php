<?php

class Emprestimo{
    private $leitor;
    private $livro;
    private $funcionario;
    private $data;
    private $dataDevolucao;
    private $dataEntrega;

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

    public function setDataDevolucao($dataDevolucao){
        $this->dataDevolucao = $dataDevolucao;
    }
    public function getDataDevolucao(){
        return $this->dataDevolucao;
    }

    public function setDataEntrega($dataEntrega){
        $this->dataEntrega = $dataEntrega;
    }
    public function getDataEntrega(){
        return $this->dataEntrega;
    }
}




?>