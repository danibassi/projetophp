<?php

    require_once ('../Conexao/Crud.php');

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

                    INSERT INTO tb_endereco(end_rua, end_numero, end_bairro, end_cidade, end_estado, end_cep, end_ibge, tb_lei_id)
                    VALUES (:rua,:numero,:bairro,:cidade,:estado,:cep,:ibge, @last_id);

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
            $stmt->bindParam(':ibge',$this->leitor->getEndereco()->getIbge());
    
            return $stmt->execute();
        }
        public function update($id){
            $sql = "UPDATE $this->table SET lei_nome = :nome, lei_dtnasc = :dtnasc, lei_sexo = :sexo 
                    WHERE lei_id = :id;

                    UPDATE tb_endereco SET end_rua = :rua, end_numero = :numero, end_bairro = :bairro, end_cidade = :cidade,
                           end_estado = :estado, end_cep = :cep, end_ibge = :ibge
                    WHERE tb_lei_id = :id;

                    UPDATE tb_telefone SET tel_numero = :telefone,tb_tip_tel_id = :tipo
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
            $stmt->bindParam(':ibge',$this->leitor->getEndereco()->getIbge());

            $stmt->bindParam(':id',$id);

            return $stmt->execute();
        }
        public function select($id){
            $sql = "SELECT l.lei_id,l.lei_nome,l.lei_email, l.lei_dtnasc, l.lei_sexo, e.end_rua, e.end_numero, e.end_bairro,
            e.end_cidade, e.end_estado, e.end_cep, e.end_ibge, t.tel_numero,tp.tip_tel_tipo
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
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function selectAll(){
            $sql = "SELECT l.lei_id,l.lei_nome,l.lei_email, l.lei_dtnasc, l.lei_sexo, e.end_rua, e.end_numero, e.end_bairro,
            e.end_cidade, e.end_estado, e.end_cep, e.end_ibge, t.tel_numero,tp.tip_tel_tipo
            FROM $this->table as l
            LEFT JOIN tb_endereco as e
            ON l.lei_id = e.tb_lei_id
            LEFT JOIN tb_telefone as t
            ON l.lei_id = t.tb_lei_id
            LEFT JOIN tb_tipo_tel as tp
            ON t.tb_tip_tel_id = tp.tip_tel_id;";
            
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        function deleteLeitorComEnderecoETelefone($id){
            $sql = "DELETE FROM tb_emprestimo WHERE tb_lei_id = :id;
                    DELETE FROM tb_telefone WHERE tb_lei_id = :id;
                    DELETE FROM tb_endereco WHERE tb_lei_id = :id;
                    DELETE FROM tb_leitor WHERE lei_id = :id;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(":id",$id);
            return $stmt->execute();
        }
    }
?>