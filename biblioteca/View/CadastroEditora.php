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
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <title>Cadastrar Editora</title>
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
            <form action="../Control/cadEditora.php" method="post">
                <label>Nome: </label>
                <input type="text" id="nome" name="nome" required><br>
                <button type="submit" name="submit">Enviar</button>
            </form>
        </div>
    </body>

</html>