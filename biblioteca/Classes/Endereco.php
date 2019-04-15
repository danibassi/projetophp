<?php

class Endereco{
    private $rua;
    private $num;
    private $cep;
    private $bairro;
    private $complemento;
    private $cidade;
    private $estado;

    public function setRua($rua){
        $this->rua = $rua;
    }

    public function setNum($num){
        $this->num = $num;
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

    public function getRua(){
        return $this->rua;
    }

    public function getNum(){
        return $this->num;
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
}



?>
