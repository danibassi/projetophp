<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}
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
        <div class="estatisticas">Empréstimos atrasados: </div>
    </body>
</html>
