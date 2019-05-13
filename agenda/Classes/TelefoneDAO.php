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
            $sql = "INSERT INTO $this->table (numero,contato_fk) VALUES (:numero, @id)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':numero',$this->telefone->getTelefone());
            return $stmt->execute();
        }

        public function insertAll($id){
            $sql = "INSERT INTO $this->table (numero,contato_fk) VALUES (:numero, :id)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':numero',$this->telefone->getTelefone());
            $stmt->bindParam(':id',$id);
            return $stmt->execute();
        }

        public function getIdDono(){
            $sql = "SELECT id FROM `contatos` ORDER BY id DESC  LIMIT 1;";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
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
        
        
        public function delete($id){
			$sql  = "DELETE FROM telefone where cont_id = :id"; 
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute(); 
		}
    }