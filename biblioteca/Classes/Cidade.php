<?php

    class Cidade{
        private $cidadeNome;
        public function getCidadeNome(){
            return $this->cidadeNome;
        }
        public function setCidadeNome($cidadeNome){
            $this->cidadeNome = $cidadeNome;
        }
    }

?>