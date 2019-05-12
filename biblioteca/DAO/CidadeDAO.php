<?php

    require_once '../Conexao/Crud.php';
    require_once '../Classes/Cidade.php';

    class EditoraDAO extends Crud{
        
        private $cidade;
        protected $table = "tb_cidade";

        function __construct($cidade){
            $this->cidade = $cidade;
        }

        public function select($id){
            $sql = "SELECT cid_nome FROM $this->table WHERE cid_id = :id;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fecth(PDO::FETCH_ASSOC);
        }

        public function selectCidadeEstado($id){
            $sql = "SELECT c.cid_nome FROM $this->table as c
            INNER JOIN tb_estado as e
            ON e.est_id = :id AND c.tb_est_id = e.est_id;";

            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fecthAll();
        }

        public function insert()
        {
            // TODO: Implement insert() method.
        }

        public function update($id)
        {
            // TODO: Implement update() method.
        }
    }

?>