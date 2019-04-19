<?php

    require_once '../Conexao/Crud.php';
    require_once '../Classes/Estado.php';

    class EstadoLivroDAO extends Crud{
        
        private $estadoLivro;
        protected $table = "tb_estado_livro";

        function __construct($estadoLivro){
            $this->estadoLivro = $estadoLivro;
        }

        public function insert(){

        }

        public function update($id){

        }

        public function select($id){
            $sql = "SELECT est_liv_estado FROM $this->table WHERE est_liv_id = :id;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fecth(PDO::FETCH_ASSOC);
        }
    }

?>