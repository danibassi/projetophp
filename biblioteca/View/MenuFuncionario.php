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
        <link rel="stylesheet" type="text/css" href="_css/estilo-inicio.css">
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <title>Menu de Funcionário</title>
    </head>
    
    <body> 
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="CadastroLeitor.php">Leitores</a>
            <a href="CadastroLivro.php">Livros</a>
            <a href="CadastrarEmprestimo.php">Empréstimos</a>
            <a href="RegistrarDevolucao.php">Devolução</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="CadastroEditora.php">Editoras</a>
            <a href="CadastroAutor.php">Autores</a>             
        </div>  
        <br>
        <div class="caixa">
            <input type="text" id="txtBusca" placeholder="Pesquise aqui..."/>
            <button id="btnBusca">Buscar</button>            
        </div>
    </body> 
</html>