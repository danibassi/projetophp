<?php

class Telefone{
    private $telefone;
    private $tipoTelefone;

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function getTelefone(){
        return $this->telefone;
    }

    public function setTipoTelefone($tipoTelefone){
        $this->tipotelefone = $tipoTelefone;
    }
    public function getTipoTelefone(){
        return $this->tipotelefone;
    }
}






?>