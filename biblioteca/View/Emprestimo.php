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
        <link rel="stylesheet" type="text/css" href="_css/styleemprestimo.css">
        <link rel="stylesheet" type="text/css" href="_css/stylehome.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Emprestimo de Livro</title>        
    </head>
    
    <body> 
    <div id="caixamenu"> 
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="ListarLeitor.php">Leitores</a>
            <a href="ListarLivro.php">Livros</a>
            <a href="ListarEmprestimos.php">Empréstimos</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="Index.php">Sair</a>           
        </div>
    </div>  

    <div class="titulo"> EMPRÉSTIMO </div>        
        <div class="caixaform">
        <form action="../Control/cadEmprestimo.php" method="post">

<!--        <input type="hidden" name="idFuncionario" value=<?php //echo $_SESSION['id']?>-->

            <label>Nome do leitor: </label>
            <input class="campo" list="leitorEscolhido" id="formatacaoForm" name="leitorEscolhido" autocomplete="off"size="40" required>
            <datalist id="leitorEscolhido" >
                <?php
                foreach ($leitorDAO->selectAll() as $key => $value):
                    echo "<option value = '$value->lei_nome'>";
                endforeach;
                ?>
            </datalist>
            
            <label style="margin-left: 20px;" >Livro: </label>
            <input class="campo" list="livroEscolhido" id="formatacaoForm" name="livroEscolhido" size="40" autocomplete="off" required>
            <datalist id="livroEscolhido">
                <?php
                foreach ($livroDAO->selectAll() as $key => $value):
                    echo "<option value = '$value->liv_nome'>";
                endforeach;
                ?>
            </datalist><br><br>
            
            <label>Data de empréstimo: </label>
            <input class="campo" id="formatacaoForm" type="date" id="dataRetirada" name="dataRetirada" required>
            
            <label style="margin-left: 20px;">Data limite de devolução: </label>
            <input class="campo" id="formatacaoForm" type="date" id="dataDevolucao" name="dataDevolucao" required><br><br>
            
            <button class="botao" type="submit" name="submit">Efetuar Empréstimo</button>
        </form>
    </div>    
    </body>
</html>