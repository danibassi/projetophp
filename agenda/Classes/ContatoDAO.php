<?php 
    require_once 'Crud.php';
    require_once 'Contato.php';

    class ContatoDAO extends Crud{

        private $contato;
        protected $table = 'contatos';

        function __construct($contato){
            $this->contato = $contato;
        }

        public function insert(){
            $sql  = "INSERT INTO $this->table (nome, email, celular, apelido, dtnasc, fk_tipocontato) VALUES (:nome, :email, :celular, :apelido, :dtnasc, :tipo)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->contato->getNome());
            $stmt->bindParam(':email', $this->contato->getEmail());
            $stmt->bindParam(':celular', $this->contato->getCelular());
            $stmt->bindParam(':apelido', $this->contato->getApelido());
            $stmt->bindParam(':dtnasc', $this->contato->getDtnasc());
            $stmt->bindParam(':tipo', $this->contato->getTipo()->getTipo());
            return $stmt->execute();
        }
    
        public function update($id){
            $sql  = "UPDATE $this->table SET nome = :nome, email = :email, celular = :celular, apelido = :apelido, dtnasc = :dtnasc, fk_tipocontato = :tipo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->contato->getNome());
            $stmt->bindParam(':email', $this->contato->getEmail());
            $stmt->bindParam(':celular', $this->contato->getCelular());
            $stmt->bindParam(':apelido', $this->contato->getApelido());
            $stmt->bindParam(':dtnasc', $this->contato->getDtnasc());
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tipo', $this->contato->getTipo()->getTipo());
            return $stmt->execute();
        }
        
        public function select($id){
            $contato_escolhido = new Contatos();
            $stmt = DB::prepare("SELECT nome,apelido,email,celular,dtnasc FROM $this->table 
                                 WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $resultado = $stmt->execute();
            //$linha = mysql_fetch_array($resultado);
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            $contato_escolhido->setNome($linha["nome"]);
            $contato_escolhido->setApelido($linha["apelido"]);
            $contato_escolhido->setEmail($linha["email"]);
            $contato_escolhido->setCelular($linha["celular"]);
            $contato_escolhido->setDtnasc($linha["dtnasc"]);
            return $contato_escolhido;
        }
    
        public function findAllCompleto(){
            $sql  = "SELECT c.id, c.nome, c.apelido, c.email, c.celular, c.dtnasc, t.tipo 
                     FROM $this->table as c 
                     INNER JOIN TipoContato as t 
                     ON c.fk_tipocontato = t.id";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
?>