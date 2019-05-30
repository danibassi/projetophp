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
        <link rel="stylesheet" type="text/css" href="_css/stylehome.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Página Inicial</title>
    </head>
    
    <body>
    <div id="caixamenu"> 
    <h3><?php echo $_SESSION['nome']?></h3>  
        <div id="menu">
            
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="ListarLeitor.php">Leitores</a>
            <a href="ListarLivro.php">Livros</a>
            <a href="ListarEmprestimos.php">Empréstimos</a>
            <a href="CadastroFuncionario.php">Funcionários</a> 
            <a href="Index.php">Sair</a>    
                 
        </div>
    </div>  
        <br>
        <div class="caixa">
            <input class="pesquisa" type="text" id="txtBusca" placeholder="Pesquise aqui..."/>
            
            <input id="btnbusca"type="image" src="_img/pesquisar.png"/>            
        </div>
    </body> 
</html>