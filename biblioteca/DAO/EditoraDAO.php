<?php

    require_once '../Conexao/Crud.php';
    require_once '../Classes/Editora.php';

    class EditoraDAO extends Crud{
        
        private $editora;
        protected $table = "tb_editora";

        function __construct($editora){
            $this->editora = $editora;
        }
        
        public function insert(){
            $sql = "INSERT INTO $this->table (edi_nome) VALUES (:nome)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',$this->editora->getEditoraNome());
            return $stmt->execute();
        }

        public function update($id){
            $sql = "UPDATE $this->table (edi_nome) SET (:nome);";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',$this->editora->getEditoraNome());
            return $stmt->execute();
        }

        public function select($id){
            $sql = "SELECT edi_nome FROM $this->table WHERE edi_id = :id;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fecth(PDO::FETCH_ASSOC);
        }
    }

?>