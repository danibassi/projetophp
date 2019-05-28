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
        <link rel="stylesheet" type="text/css" href="_css/styledevolucao.css">
        <link rel="stylesheet" type="text/css" href="_css/estilohome.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Devolução</title>
    </head>
    
    <body> 
    <div id="caixamenu"> 
        <div id="menu">
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

    <div class="titulo"> DEVOLUÇÃO </div>        
        <div class="caixaform">
        <form action="#" method="post">
      
            <label>Nome do leitor: </label>
            <input class="campo" id="formatacaoForm" type="text" id="nomeUsuario" name="nomeUsuario" size="50" required><br><br>
            
            <label>Código do livro: </label>
            <input class="campo" id="formatacaoForm" type="text" id="IdLivro" name="IdLivro" size="50" required><br><br>
                        
            <label>Data da devolução: </label>
            <input class="campo" id="formatacaoForm" type="date" id="dataDevolucao" name="dataDevolucao" size="40" required><br>
            
            <button class="botao" type="submit" name="submit">Efetuar Devolução</button>
        </form>
    </div>    
    </body>
</html>