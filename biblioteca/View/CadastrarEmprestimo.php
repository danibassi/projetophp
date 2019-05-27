<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: Index.php");
    exit;
}

require_once "../Classes/Leitor.php";
require_once "../DAO/LeitorDAO.php";
require_once "../Classes/Livro.php";
require_once "../DAO/LivroDAO.php";

$livroDAO = new LivroDAO(new Livro());
$leitorDAO = new LeitorDAO(new Leitor());

?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <title>Emprestimo de Livro</title>        
    </head>
    
    <body> 
    <header>
        <nav>
            <ul class="ul">
                <li class="li"><a href="MenuFuncionario.php">Página inicial</a></li>
            </ul>
        </nav>
    </header> 
    <div style="float: left; width: 20%">
        <table border=1>
            <td>
                <li><a href="CadastroAutor.php">Cadastrar autor</a></li>
                <li><a href="CadastroEditora.php">Cadastrar editora</a></li>
                <li><a href="CadastroLivro.php">Cadastrar livro</a></li>
                <li><a href="CadastroLeitor.php">Cadastrar usuário</a></li>
                <li><a href="CadastroFuncionario.php">Cadastrar funcionário</a></li>
                <li><a href="RegistrarDevolucao.php">Devolução</a></li>
                <li><a href="CadastrarEmprestimo.php">Empréstimo</a></li>
                <li><a href="EditarLivro.php">Editar livro cadastrado</a></li>
                <li><a href="ListarLeitor.php">Leitores cadastrados</a></li>
                <li><a href="ListarLivro.php">Livros cadastrados</a></li>
            </td>            
        </table>                
    </div>  
    
        
    <div id="divBusca" style="float: left; width: 80%">
        Empréstimo de livro
        <form action="../Control/cadEmprestimo.php" method="post">

<!--        <input type="hidden" name="idFuncionario" value=<?php //echo $_SESSION['id']?>-->

            <label>Nome do leitor: </label>
            <input list="leitorEscolhido" id="formatacaoForm" name="leitorEscolhido" autocomplete="off" required>
            <datalist id="leitorEscolhido" >
                <?php
                foreach ($leitorDAO->selectAll() as $key => $value):
                    echo "<option value = '$value->lei_nome'>";
                endforeach;
                ?>
            </datalist><br>
            
            <label>Livro: </label>
            <input list="livroEscolhido" id="formatacaoForm" name="livroEscolhido" autocomplete="off" required>
            <datalist id="livroEscolhido">
                <?php
                foreach ($livroDAO->selectAll() as $key => $value):
                    echo "<option value = '$value->liv_nome'>";
                endforeach;
                ?>
            </datalist><br>
            
            <label>Data de empréstimo: </label>
            <input id="formatacaoForm" type="date" id="dataRetirada" name="dataRetirada" required><br>
            
            <label>Data limite de devolução: </label>
            <input id="formatacaoForm" type="date" id="dataDevolucao" name="dataDevolucao" required><br>
            
            <button type="submit" name="submit">Enviar</button>
        </form>
    </div>    
    </body>
</html>