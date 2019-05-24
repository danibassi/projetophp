<?php
    require_once '../Classes/Livro.php';
    require_once '../Conexao/Crud.php';

    class EmprestimoDAO extends Crud{

        private $emprestimo;
        protected $table = "tb_emprestimo";

        function __construct($emprestimo){
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
//            $sql = "UPDATE $this->table
//            SET liv_nome = :nome, liv_ano_publicacao = :ano_publicacao, liv_edicao = :edicao,
//            tb_est_liv_id = :estadoLivro, liv_isbd = :isbd, tb_edi_id = :editora,
//            tb_aut_id = :autor, tb_gen_id = :genero, liv_quantidade = :quantidade
//            WHERE liv_id = :id";
//            $stmt = DB::prepare($sql);
//            $stmt->bindParam(':nome',$this->livro->getNome());
//            $stmt->bindParam(':ano_publicacao',$this->livro->getAnoPublicacao());
//            $stmt->bindParam(':edicao',$this->livro->getEdicao());
//            $stmt->bindParam(':estadoLivro',$this->livro->getEstadoLivro()->getEstado());
//            $stmt->bindParam(':isbd',$this->livro->getIsbd());
//            $stmt->bindParam(':editora',$this->livro->getEditora()->getEditoraNome());
//            $stmt->bindParam(':autor',$this->livro->getAutor()->getNome());
//            $stmt->bindParam(':genero',$this->livro->getGenero()->getGenero());
//            $stmt->bindParam(':quantidade',$this->livro->getQuantidade());
//            $stmt->bindParam(':id',$id);
//            return $stmt->execute();
        }

        public function select($id){
//            $sql = "SELECT l.liv_nome,l.liv_ano_publicacao, l.liv_edicao,
//            l.liv_isbd, l.liv_quantidade, el.est_liv_estado, e.edi_nome, a.aut_nome, g.gen_genero
//            FROM $this->table as l
//            INNER JOIN tb_estado_livro as el
//            ON l.tb_est_liv_id = el.est_liv_id
//            INNER JOIN tb_editora as e
//            ON l.tb_edi_id = e.edi_id
//            INNER JOIN tb_autor as a
//            ON l.tb_aut_id = a.aut_id
//            INNER JOIN tb_genero as g
//            ON l.tb_gen_id = g.gen_id
//            WHERE l.liv_id = :id;";
//            $stmt = DB::prepare($sql);
//            $stmt->bindParam(':id',$id);
//            $stmt->execute();
//            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function selectAll(){
//            $sql = "SELECT l.liv_id,l.liv_nome,l.liv_ano_publicacao, l.liv_edicao,
//            l.liv_isbd, l.liv_quantidade, el.est_liv_estado, e.edi_nome, a.aut_nome, g.gen_genero
//            FROM $this->table as l
//            INNER JOIN tb_estado_livro as el
//            ON l.tb_est_liv_id = el.est_liv_id
//            INNER JOIN tb_editora as e
//            ON l.tb_edi_id = e.edi_id
//            INNER JOIN tb_autor as a
//            ON l.tb_aut_id = a.aut_id
//            INNER JOIN tb_genero as g
//            ON l.tb_gen_id = g.gen_id;";
//            $stmt = DB::prepare($sql);
//            $stmt->bindParam(':id',$id);
//            $stmt->execute();
//            return $stmt->fetchAll();
        }

        public function delete($id){
            $sql = "DELETE FROM $this->table WHERE emp_id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
    }
?>