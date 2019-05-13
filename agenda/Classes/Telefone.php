<?php
    class Telefone{
        private $telefone;
        private $dono;

        function setTelefone($telefone){
            $this->telefone = $telefone;
        }
        function getTelefone(){
            return $this->telefone;
        }
        function setDono($dono){
            $this->dono = $dono;
        }
        function getDono(){
            return $this->dono;
        }
    }
?>