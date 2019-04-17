<?php

    require_once '../Conexao/Crud.php';

    class LeitorDAO extends Crud{

        private $leitor;
        protected $table = 'tb_leitor';

        function __construct($leitor){
            $this->leitor = $leitor;
        }

        public function insert(){
            $sql = "INSERT INTO $this->table (lei_nome,lei_email, lei_dtnasc, lei_sexo) 
                    VALUES (:nome,:email,:dtnasc,:sexo);

                    SET @last_id = LAST_INSERT_ID();

                    INSERT INTO tb_endereco(end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, tb_lei_id)
                    VALUES (:rua,:numero,:bairro,:cidade,:estado,:cep, @last_id);

                    INSERT INTO tb_telefone (tel_numero,tb_tip_tel_id, tb_lei_id)
                    VALUES (:telefone,:tipo, @last_id);
                    ";
                    
            $stmt = DB::prepare($sql);

            $stmt->bindParam(':nome', $this->leitor->getNome());
            $stmt->bindParam(':email',$this->leitor->getEmail());
            $stmt->bindParam(':dtnasc',$this->leitor->getDtnasc());
            $stmt->bindParam(':sexo',$this->leitor->getSexo());
            
            $stmt->bindParam(':telefone',$this->leitor->getTelefone()->getNumero());
            $stmt->bindParam(':tipo',$this->leitor->getTelefone()->getTipoTelefone()->getTipo());
            
            $stmt->bindParam(':rua',$this->leitor->getEndereco()->getRua());
            $stmt->bindParam(':numero',$this->leitor->getEndereco()->getNumero());
            $stmt->bindParam(':bairro',$this->leitor->getEndereco()->getBairro());
            $stmt->bindParam(':cidade',$this->leitor->getEndereco()->getCidade());
            $stmt->bindParam(':estado',$this->leitor->getEndereco()->getEstado());
            $stmt->bindParam(':cep',$this->leitor->getEndereco()->getCep());
    
            return $stmt->execute();
        }
        public function update($id){
            $sql = "UPDATE $this->table SET lei_nome = :nome, lei_dtnasc = :dtnasc, lei_sexo = :sexo 
                    WHERE lei_id = :id;

                    UPDATE tb_endereco (end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, tb_lei_id)
                    SET (:rua,:numero,:bairro,:cidade,:estado,:cep, @last_id)
                    WHERE tb_lei_id = :id;

                    UPDATE tb_telefone (tel_numero,tb_tip_tel_id, tb_lei_id)
                    SET (:telefone,:tipo, @last_id)
                    WHERE tb_lei_id = :id;
                    ";
            $stmt = DB::prepare($sql);

            $stmt->bindParam(':nome', $this->leitor->getNome());
            $stmt->bindParam(':email',$this->leitor->getEmail());
            $stmt->bindParam(':dtnasc',$this->leitor->getDtnasc());
            $stmt->bindParam(':sexo',$this->leitor->getSexo());
            
            $stmt->bindParam(':telefone',$this->leitor->getTelefone()->getNumero());
            $stmt->bindParam(':tipo',$this->leitor->getTelefone()->getTipoTelefone()->getTipo());
            
            $stmt->bindParam(':rua',$this->leitor->getEndereco()->getRua());
            $stmt->bindParam(':numero',$this->leitor->getEndereco()->getNumero());
            $stmt->bindParam(':bairro',$this->leitor->getEndereco()->getBairro());
            $stmt->bindParam(':cidade',$this->leitor->getEndereco()->getCidade());
            $stmt->bindParam(':estado',$this->leitor->getEndereco()->getEstado());
            $stmt->bindParam(':cep',$this->leitor->getEndereco()->getCep());
        }
        public function select($id){
            $sql = "SELECT l.lei_nome,l.lei_email, l.lei_dtnasc, l.lei_sexo, e.end_rua, e.end_numero, e.end_bairro,
            e.end_cidade, e.end_estado, e.end_cep, t.tel_numero,tp.tip_tel_tipo
            FROM $this->table as l
            INNER JOIN tb_endereco as e
            ON l.lei_id = e.tb_lei_id
            INNER JOIN tb_telefone as t
            ON l.lei_id = t.tb_lei_id
            INNER JOIN tb_tipo_tel as tp
            ON t.tb_tip_tel_id = tp.tip_tel_id
            WHERE lei_id = :id;";
            
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch();
        }
    }
?>