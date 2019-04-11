<?php
    require_once "Crud.php";
    
    class TipoContato extends Crud{

        protected $table = "TipoContato";
        private $tipo;

        public function setTipo($tipo){
            $this->tipo = $tipo;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function insert(){

        }
        
        public function update($id){

        }
    }
?>