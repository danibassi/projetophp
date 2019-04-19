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
            liv_estado, liv_isbd, tb_edi_id, tb_aut_id, tb_gen_id) 
            VALUES (:nome, :ano_publicacao, :edicao, :estado, :isbd, :editora, :autor, :genero);";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',$this->livro->getNome());
            $stmt->bindParam(':ano_publicacao',$this->livro->getAnoPublicaco());
            $stmt->bindParam(':edicao',$this->livro->getEdicao());
            $stmt->bindParam(':estado',$this->livro->getEstadoLivro()->getEstado());
            $stmt->bindParam(':isbd',$this->livro->getIsbd());
            $stmt->bindParam(':editora',$this->livro->getEditora()->getNome());
            $stmt->bindParam(':autor',$this->livro->getAutor()->getNome());
            $stmt->bindParam(':genero',$this->livro->getGenero()->getGenero());
            return $stmt->execute();
        }

        public function update(){
            $sql = "UPDATE $this->table (liv_nome,liv_ano_publicacao, liv_edicao,
            liv_estado, liv_isbd, tb_edi_id, tb_aut_id, tb_gen_id) 
            SET (:nome, :ano_publicacao, :edicao, :estado, :isbd, :editora, :autor, :genero);";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome',$this->livro->getNome());
            $stmt->bindParam(':ano_publicacao',$this->livro->getAnoPublicaco());
            $stmt->bindParam(':edicao',$this->livro->getEdicao());
            $stmt->bindParam(':estado',$this->livro->getEstado());
            $stmt->bindParam(':isbd',$this->livro->getIsbd());
            $stmt->bindParam('',$this->livro->getEditora()->getNome());
            $stmt->bindParam('',$this->livro->getAutor()->getNome());
            $stmt->bindParam('',$this->livro->getGenero()->getGenero());
            return $stmt->execute();
        }

        public function select($id){
            $sql = "SELECT l.liv_nome,l.liv_ano_publicacao, l.liv_edicao,
            l.liv_estado, l.liv_isbd, e.edi_nome, a.aut_nome, g.gen_genero
            FROM $this->table as l
            INNER JOIN tb_editora as e
            ON l.tb_edi_id = e.edt_id
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
    }
?>