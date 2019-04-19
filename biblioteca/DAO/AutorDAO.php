<?php

    require_once '../Conexao/Crud.php';

    class AutorDAO extends Crud{

        private $autor;
        protected $table = 'tb_autor';

        function __construct($autor){
            $this->autor = $autor;
        }

        public function insert(){
            $sql = "INSERT INTO $this->table (aut_nome, aut_dtnasc, aut_sexo) VALUES (:nome, :dtnasc, :sexo)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->autor->getNome());
            $stmt->bindParam(':dtnasc',$this->autor->getDtnasc());
            $stmt->bindParam(':sexo',$this->autor->getSexo());
            return $stmt->execute();
        }
        public function update($id){
            $sql = "UPDATE $this->table SET aut_nome = :nome, aut_dtnasc = :dtnasc, aut_sexo = :sexo WHERE aut_id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->autor->getNome());
            $stmt->bindParam(':dtnasc',$this->autor->getDtnasc());
            $stmt->bindParam(':sexo',$this->autor->getSexo());
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        public function select($id){
            $sql = "SELECT aut_id, aut_nome, aut_dtnasc, aut_sexo FROM $this->table WHERE aut_id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>