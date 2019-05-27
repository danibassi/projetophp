<?php

class Endereco{
    private $rua;
    private $numero;
    private $cep;
    private $bairro;
    private $complemento;
    private $cidade;
    private $estado;
    private $ibge;

    public function setRua($rua){
        $this->rua = $rua;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }
    
    public function setCep($cep){
        $this->cep = $cep;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function setIbge($ibge){
        $this->ibge = $ibge;
    }

    public function getRua(){
        return $this->rua;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getCep(){
        return $this->cep;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getIbge(){
        return $this->ibge;
    }
}



?>
