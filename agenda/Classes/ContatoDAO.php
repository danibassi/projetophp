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
            $sql  = "INSERT INTO $this->table (nome, email, apelido, dtnasc, fk_tipocontato)
            VALUES (:nome, :email, :apelido, :dtnasc, :tipo, :usuario)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->contato->getNome());
            $stmt->bindParam(':email', $this->contato->getEmail());
            $stmt->bindParam(':apelido', $this->contato->getApelido());
            $stmt->bindParam(':dtnasc', $this->contato->getDtnasc());
            $stmt->bindParam(':tipo', $this->contato->getTipo()->getTipo());
            return $stmt->execute();
        }

        public function insertCompleto($id){
            $sql  = "INSERT INTO $this->table (nome, email, apelido, dtnasc, fk_tipocontato, fk_usuario)
            VALUES (:nome, :email, :apelido, :dtnasc, :tipo, :usuario)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->contato->getNome());
            $stmt->bindParam(':email', $this->contato->getEmail());
            $stmt->bindParam(':apelido', $this->contato->getApelido());
            $stmt->bindParam(':dtnasc', $this->contato->getDtnasc());
            $stmt->bindParam(':tipo', $this->contato->getTipo()->getTipo());
            $stmt->bindParam(':usuario', $id);
            return $stmt->execute();
        }
    
        public function update($id){
            $sql  = "UPDATE $this->table SET nome = :nome, email = :email, apelido = :apelido, dtnasc = :dtnasc, fk_tipocontato = :tipo WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->contato->getNome());
            $stmt->bindParam(':email', $this->contato->getEmail());
            $stmt->bindParam(':apelido', $this->contato->getApelido());
            $stmt->bindParam(':dtnasc', $this->contato->getDtnasc());
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tipo', $this->contato->getTipo()->getTipo());
            return $stmt->execute();
        }
        
        public function select($id){
            $contato_escolhido = new Contatos();
            $stmt = DB::prepare("SELECT nome,apelido,email,dtnasc FROM $this->table 
                                 WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $resultado = $stmt->execute();
            //$linha = mysql_fetch_array($resultado);
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            $contato_escolhido->setNome($linha["nome"]);
            $contato_escolhido->setApelido($linha["apelido"]);
            $contato_escolhido->setEmail($linha["email"]);
            $contato_escolhido->setDtnasc($linha["dtnasc"]);
            return $contato_escolhido;
        }
    
        public function findAllCompleto($id){
            $sql  = "SELECT c.id, c.nome, c.apelido, c.email, c.dtnasc, t.tipo 
                     FROM $this->table as c 
                     INNER JOIN TipoContato as t 
                     ON c.fk_tipocontato = t.id
                     WHERE c.fk_usuario = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function delete($id){
			$sql  = "DELETE FROM telefone WHERE contato_fk = :id;
                     DELETE FROM $this->table WHERE id = :id;";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute(); 
		}
    }
?>