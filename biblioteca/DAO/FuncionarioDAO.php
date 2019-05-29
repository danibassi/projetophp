<?php

    require_once '../Conexao/Crud.php';
    require_once '../Classes/Funcionario.php';

    class FuncionarioDAO extends Crud{
        
        private $funcionario;

        protected $table = 'tb_funcionario';

        function __construct(Funcionario $funcionario){
            $this->funcionario = $funcionario;
        }

        public function insert(){
            $sql = "INSERT INTO $this->table (fun_nome,fun_email, fun_password ,fun_sexo) 
                    VALUES (:nome,:email,:senha,:sexo);";    
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->funcionario->getNome());
            $stmt->bindParam(':email',$this->funcionario->getEmail());
            $stmt->bindParam(':senha',$this->funcionario->getPassword());
            $stmt->bindParam(':sexo',$this->funcionario->getSexo());
    
            return $stmt->execute();
        }
        public function update($id){
            
            $sql = "INSERT INTO $this->table (fun_nome,fun_email, fun_password ,fun_sexo) 
                    VALUES (:nome,:email,:dtnasc,:sexo);";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->funcionario->getNome());
            $stmt->bindParam(':email',$this->funcionario->getEmail());
            $stmt->bindParam(':password',$this->funcionario->getPassword());
            $stmt->bindParam(':sexo',$this->funcionario->getSexo());
            return $stmt->execute();
        }
        public function select($id){
            $sql = "SELECT fun_id,fun_nome,fun_email, fun_password ,fun_sexo
            WHERE lei_id = :id;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getNomeEmailAndPassword(){
            $sql = "SELECT fun_id, fun_nome, fun_email,fun_password FROM $this->table WHERE fun_email = :email";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':email',$this->funcionario->getEmail());
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>