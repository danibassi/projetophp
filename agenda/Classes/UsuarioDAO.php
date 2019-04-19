<?php
    require_once 'Crud.php';
    require_once 'Usuarios.php';

    class UsuarioDAO extends Crud{
        protected $table = 'usuario';

        private $usuario;

        function __construct($usuario){
            $this->usuario = $usuario; 
        }

        public function insert(){

            $sql  = "INSERT INTO $this->table (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->usuario->getNome());
            $stmt->bindParam(':email', $this->usuario->getEmail());
            $stmt->bindParam(':senha', $this->usuario->getSenha());
            return $stmt->execute(); 
    
        }
    
        public function update($id){
    
            $sql  = "UPDATE $this->table SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':nome', $this->usuario->getNome());
            $stmt->bindParam(':email', $this->usuario->getEmail());
            $stmt->bindParam(':senha', $this->usuario->getSenha());
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
    
        }
    
        public function select($id){
            $usuario_escolhido = new Contatos();
            /*$resultado = mysql_query("SELECT nome,apelido,email,celular,dtnasc FROM $this->table WHERE id=".$id);*/
    
            $stmt = DB::prepare("SELECT nome,apelido,email,celular,dtnasc FROM $this->table WHERE id = :id");
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
    }





?>
