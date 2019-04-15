<?php

class Autor{

    private $nome;
    private $dtnasc;
    private $sexo;

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }

    public function setDtnasc($dtnasc){
        $this->dtnasc = $dtnasc;
    }
    public function getDtnasc(){
        return $this->dtnasc;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    public function getSexo(){
        return $this->sexo;
    }
}








?>


