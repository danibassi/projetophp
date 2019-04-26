<?php
    require_once 'Crud.php';
    require_once 'Telefone.php';

    class TelefoneDAO extends Crud{
        protected $table = "telefone";
        private $telefone;

        function __construct($telefone){
            $this->telefone = $telefone;
        }

        public function insert(){
            $sql = "INSERT INTO $this->table (numero,contato_fk) VALUES (:numero,:contato_fk)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':numero',$this->telefone->getTelefone());
            $stmt->bindParam(':contato_fk',$this->telefone->getDono());
            return $stmt->execute();
        }
        public function update($id){

        }
        public function findAllTelefone($id){
			$sql  = "SELECT * FROM $this->table WHERE contato_fk = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
			$stmt->execute();
			return $stmt->fetchAll();
		}
    }