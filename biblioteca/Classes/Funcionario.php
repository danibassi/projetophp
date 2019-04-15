<?php

class Funcionario{

    private $nome;
    private $sexo;
    private $email;
    private $password;



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

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    public function getSexo(){
        return $this->sexo;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }

}








?>