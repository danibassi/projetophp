<?php
    require_once '../Classes/Livro.php';
    require_once '../Conexao/Crud.php';

    class EmprestimoDAO extends Crud{

        private $emprestimo;
        protected $table = "tb_emprestimo";

        function __construct(Emprestimo $emprestimo){
            $this->emprestimo = $emprestimo;
        }
        
        
        public function insert(){
            $sql = "SET @leitor = (SELECT lei_id FROM tb_leitor WHERE lei_nome = :leitor);
                    SET @livro = (SELECT liv_id FROM tb_livro WHERE liv_nome = :livro);
                    INSERT INTO $this->table (tb_lei_id, tb_liv_id, tb_fun_id, emp_data,
                    emp_data_devolucao)
                    VALUES (@leitor,@livro,:funcionario,:dataEmprestimo,:dataDevolucao);
                    UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel - 1 WHERE liv_nome = :livro;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':leitor',$this->emprestimo->getLeitor());
            $stmt->bindParam(':livro',$this->emprestimo->getLivro());
            $stmt->bindParam(':funcionario',$this->emprestimo->getFuncionario());
            $stmt->bindParam(':dataEmprestimo',$this->emprestimo->getData());
            $stmt->bindParam(':dataDevolucao',$this->emprestimo->getDataDevolucao());

            return $stmt->execute();
        }

        public function update($id){
            $sql = "SET @leitor = (SELECT lei_id FROM tb_leitor WHERE lei_nome = :leitor);
                    SET @livro = (SELECT liv_id FROM tb_livro WHERE liv_nome = :livro);
                    UPDATE $this->table
                    SET tb_lei_id = @leitor, tb_liv_id = @livro, tb_fun_id = :funcionario,
                    emp_data = :dataEmprestimo, emp_data_devolucao = :dataDevolucao
                    WHERE emp_id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':leitor',$this->emprestimo->getLeitor());
            $stmt->bindParam(':livro',$this->emprestimo->getLivro());
            $stmt->bindParam(':funcionario',$this->emprestimo->getFuncionario());
            $stmt->bindParam(':dataEmprestimo',$this->emprestimo->getData());
            $stmt->bindParam(':dataDevolucao',$this->emprestimo->getDataDevolucao());
            $stmt->bindParam(':id',$id);
            return $stmt->execute();
        }

        public function select($id){
            $sql = "SELECT le.lei_nome, li.liv_nome, fu.fun_nome, em.emp_data, em.emp_data_devolucao 
                    FROM $this->table as em
                    INNER JOIN tb_leitor as le
                    ON le.lei_id = em.tb_lei_id
                    INNER JOIN tb_livro as li
                    ON li.liv_id = em.tb_liv_id
                    INNER JOIN tb_funcionario as fu
                    ON fu.fun_id = em.tb_fun_id
                    WHERE em.emp_id = :id;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function selectEmprestimoPendente(){
            $sql = "SELECT em.emp_id, le.lei_nome, li.liv_nome, fu.fun_nome, em.emp_data, em.emp_data_devolucao 
                    FROM $this->table as em
                    INNER JOIN tb_leitor as le
                    ON le.lei_id = em.tb_lei_id
                    INNER JOIN tb_livro as li
                    ON li.liv_id = em.tb_liv_id
                    INNER JOIN tb_funcionario as fu
                    ON fu.fun_id = em.tb_fun_id
                    WHERE em.emp_data_entregue is null;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function selectDevolucaoFeita(){
            $sql = "SELECT em.emp_id, le.lei_nome, li.liv_nome, fu.fun_nome, em.emp_data, em.emp_data_devolucao 
                    FROM $this->table as em
                    INNER JOIN tb_leitor as le
                    ON le.lei_id = em.tb_lei_id
                    INNER JOIN tb_livro as li
                    ON li.liv_id = em.tb_liv_id
                    INNER JOIN tb_funcionario as fu
                    ON fu.fun_id = em.tb_fun_id
                    WHERE em.emp_data_entregue is not null;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function devolucao($id){
            $sql = "UPDATE $this->table SET emp_data_entregue = :dataEntrega WHERE emp_id = :id;
                    UPDATE tb_livro SET liv_qntd_disponivel = liv_qntd_disponivel + 1 WHERE liv_nome = :livro";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':dataEntrega', $this->emprestimo->getDataEntrega());
            $stmt->bindParam(':livro', $this->emprestimo->getLivro());
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
    }
?>