<?php

    require_once '../Conexao/Crud.php';
    require_once '../Classes/Estado.php';

    class EstadoDAO extends Crud{
        
        private $estado;
        protected $table = "tb_estado";

        function __construct($estado){
            $this->estado = $estado;
        }

        public function select(){
            $sql = "SELECT est_estado FROM $this->table WHERE est_id = :id;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fecth(PDO::FETCH_ASSOC);
        }
    }

?>