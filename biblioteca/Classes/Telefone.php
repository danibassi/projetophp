<?php

require_once 'TipoTelefone.php';

class Telefone{
    private $numero;
    private $tipoTelefone;

    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getNumero(){
        return $this->numero;
    }

    public function setTipoTelefone($tipoTelefone){
        $this->tipoTelefone = $tipoTelefone;
    }
    public function getTipoTelefone(){
        return $this->tipoTelefone;
    }
}






?>