<?php
    require_once '../Classes/Livro.php';
    require_once '../Conexao/Crud.php';
    class LivroDAO extends Crud{
        private $livro;
        protected $table = "tb_livro";

        function __construct($livro){
            $this->livro = $livro;
        }
        
        
        public function insert(){  
            $sql = "INSERT INTO $this->table (liv_nome,liv_ano_publicacao, liv_edicao,
            tb_est_liv_id, liv_isbd, tb_edi_id, tb_aut_id, tb_gen_id) 
            VALUES (:nome, :ano_publicacao, :edicao, :estado, :isbd, :editora, :autor, :genero);";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',$this->livro->getNome());
            $stmt->bindParam(':ano_publicacao',$this->livro->getAnoPublicacao());
            $stmt->bindParam(':edicao',$this->livro->getEdicao());
            $stmt->bindParam(':estado',$this->livro->getEstadoLivro()->getEstado());
            $stmt->bindParam(':isbd',$this->livro->getIsbd());
            $stmt->bindParam(':editora',$this->livro->getEditora()->getEditoraNome());
            $stmt->bindParam(':autor',$this->livro->getAutor()->getNome());
            $stmt->bindParam(':genero',$this->livro->getGenero()->getGenero());
            return $stmt->execute();
        }

        public function update($id){
            $sql = "UPDATE $this->table (liv_nome,liv_ano_publicacao, liv_edicao,
            liv_estado, liv_isbd, tb_edi_id, tb_aut_id, tb_gen_id) 
            SET (:nome, :ano_publicacao, :edicao, :estadoLivro, :isbd, :editora, :autor, :genero);";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',$this->livro->getNome());
            $stmt->bindParam(':ano_publicacao',$this->livro->getAnoPublicacao());
            $stmt->bindParam(':edicao',$this->livro->getEdicao());
            $stmt->bindParam(':estadoLivro',$this->livro->getEstadoLivro()->getEstado());
            $stmt->bindParam(':isbd',$this->livro->getIsbd());
            $stmt->bindParam(':editora',$this->livro->getEditora()->getEditoraNome());
            $stmt->bindParam(':autor',$this->livro->getAutor()->getNome());
            $stmt->bindParam(':genero',$this->livro->getGenero()->getGenero());
            return $stmt->execute();
        }

        public function select($id){
            $sql = "SELECT l.liv_nome,l.liv_ano_publicacao, l.liv_edicao,
            l.liv_isbd, el.est_liv_estado, e.edi_nome, a.aut_nome, g.gen_genero
            FROM $this->table as l
            INNER JOIN tb_estado_livro as el
            ON l.tb_est_liv_id = el.est_liv_id
            INNER JOIN tb_editora as e
            ON l.tb_edi_id = e.edi_id
            INNER JOIN tb_autor as a
            ON l.tb_aut_id = a.aut_id
            INNER JOIN tb_genero as g
            ON l.tb_gen_id = g.gen_id
            WHERE l.liv_id = :id;";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function selectAll(){
            $sql = "SELECT l.liv_id,l.liv_nome,l.liv_ano_publicacao, l.liv_edicao,
            l.liv_isbd, el.est_liv_estado, e.edi_nome, a.aut_nome, g.gen_genero
            FROM $this->table as l
            INNER JOIN tb_estado_livro as el
            ON l.tb_est_liv_id = el.est_liv_id
            INNER JOIN tb_editora as e
            ON l.tb_edi_id = e.edi_id
            INNER JOIN tb_autor as a
            ON l.tb_aut_id = a.aut_id
            INNER JOIN tb_genero as g
            ON l.tb_gen_id = g.gen_id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
?>