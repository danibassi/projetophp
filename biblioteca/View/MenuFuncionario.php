<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: Index.php");
    exit;
}
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/estilohome.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Página Inicial</title>
    </head>
    
    <body>
    <div id="caixamenu"> 
        <div id="menu">
            <h3 style="float: left"><?php echo $_SESSION['nome']?></h3>
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="CadastroLeitor.php">Leitores</a>
            <a href="CadastroLivro.php">Livros</a>
            <a href="Emprestimo.php">Empréstimos</a>
            <a href="RegistrarDevolucao.php">Devolução</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="CadastroEditora.php">Editoras</a>
            <a href="CadastroAutor.php">Autores</a>             
        </div>
    </div>  
        <br>
        <div class="caixa">
            <input class="pesquisa" type="text" id="txtBusca" placeholder="Pesquise aqui..."/>
            
            <input id="btnbusca"type="image" src="_img/pesquisar.png"/>            
        </div>
    </body> 
</html>