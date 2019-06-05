<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}

require_once "../Classes/Leitor.php";
require_once "../Classes/Livro.php";
require_once "../Classes/Emprestimo.php";
require_once "../DAO/LeitorDAO.php";
require_once "../DAO/LivroDAO.php";
require_once "../DAO/EmprestimoDAO.php";

$leitorDAO = new LeitorDAO(new Leitor());
$livroDAO = new LivroDAO(new Livro());
$emprestimoDAO = new EmprestimoDAO(new Emprestimo());

?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/stylehome.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Página Inicial</title>
    </head>

    <body>
    <div id="caixamenu">
    <div id="logo"><img src="_img/logobranco.png" width="50px" height="50px"></div>
        <div class="nome">Biblioteca</div>
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="ListarLeitor.php">Leitores</a>
            <a href="ListarLivro.php">Livros</a>
            <a href="ListarEmprestimos.php">Empréstimos</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="../index.php">Sair</a>

        </div>
    </div>
        <br>
        <div class="caixa">
            <div class="texto"> Bem vindo(a): <?php echo $_SESSION['nome']?></div>
        </div>
        <div class="estatisticas">Leitores Cadastrados: <?php echo $leitorDAO->getQuantidadeLeitores()['conta']?></div>
        <div class="estatisticas">Livros Cadastrados: <?php echo $livroDAO->getQuantidadeLeitores()['conta']?></div>
        <div class="estatisticas">Empréstimos atrasados: <?php echo $emprestimoDAO->getQuantidadeAtrasodo()['conta']?></div>
        <div class="estatisticas">Empréstimos entreges: <?php echo $emprestimoDAO->getQuantidadeNaoAtrasados()['conta']?></div>
        <div class="estatisticas">Total de emprestimos realizados:
            <?php
                echo $emprestimoDAO->getQuantidadeNaoAtrasados()['conta'] + $emprestimoDAO->getQuantidadeAtrasodo()['conta'];
            ?>
        </div>
    </body>
</html>
