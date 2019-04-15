<?php

class Leitor{

    private $nome;
    private $email;
    private $dtnasc;
    private $sexo;
    private $endereco;
    private $telefone;

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this-email;
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

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    public function getEndereco(){
        return $this->endereco;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function getTelefone(){
        return $this->telefone;
    }

    

}




?>