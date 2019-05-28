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
        <link rel="stylesheet" type="text/css" href="_css/stylefuncionario.css">
        <link rel="stylesheet" type="text/css" href="_css/estilohome.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Funcionários</title>
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

    <div class="titulo"> FUNCIONÁRIO </div>        
        <div class="caixaform">
            <form action="../Control/cadFuncionario.php" method="post">

                <label>Nome: </label>
                <input class="campo" id="formatacaoForm" type="text" id="nome" name="nome" size="50" required><br><br>

                <label>Sexo: </label>
                <a>Feminino</a><input type="radio" name="sexo" value="Feminino">
                <a>Masculino</a><input type="radio" name="sexo" value="Masculino"> <br><br>     

                <label>E-mail: </label>
                <input class="campo" id="formatacaoForm" type="text" id="email" name="email" size="50" required><br><br>

                <label>Senha:</label>
                <input class="campo" id="formatacaoForm" type="password" name="password" size="40" required><br>

                <button class="botao" type="submit" name="submit">Enviar</button>

            </form>
        </div>    
    </body>
</html>