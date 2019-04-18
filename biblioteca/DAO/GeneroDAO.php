<?php

    require_once '../Conexao/Crud.php';
    require_once '../Classes/Genero.php';

    class GeneroDAO extends Crud{
        
        private $genero;
        protected $table = "tb_genero";

        function __construct($genero){
            $this->genero = $genero;
        }
        
        public function insert(){
            $sql = "INSERT INTO $this->table (gen_genero) VALUES (:nome)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',$this->editora->getNome());
            return $stmt->execute();
        }

        public function update($id){
            $sql = "UPDATE $this->table (gen_genero) SET (:nome);";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',$this->editora->getNome());
            return $stmt->execute();
        }

        public function select(){
            $sql = "SELECT gen_genero FROM $this->table WHERE edi_id = :id;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fecth();
        }
    }

?>