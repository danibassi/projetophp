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
                <li><a href="CadastroLeitor.php">Cadastrar Usuário</a></li>
                <li><a href="CadastroFuncionario.php">Cadastrar funcionário</a></li>
                <li><a href="Emprestimo.php">Empréstimos</a></li>
                <li><a href="EditarLivro.php">Editar livro cadastrado</a></li>
                <li><a href="ListarLeitor.php">Leitores cadastrados</a></li>
                <li><a href="ListarLivro.php">Livros cadastrados</a></li>
            </td>            
        </table>                
    </div>  
    
        
    <div id="divBusca" style="float: left; width: 80%">
        Empréstimo de livro
        <form action="#" method="post">
      
            <label>Nome do leitor: </label>
            <input id="formatacaoForm" type="text" id="nomeUsuario" name="nomeUsuario" required><br>
            
            <label>Id Livro: </label>
            <input id="formatacaoForm" type="text" id="IdLivro" name="IdLivro" required><br>
            
            <label>Data de empréstimo: </label>
            <input id="formatacaoForm" type="date" id="dataRetirada" name="dataRetirada" required><br>
            
            <label>Data limite de devolução: </label>
            <input id="formatacaoForm" type="date" id="limiteDevolucao" name="limiteDevolucao" required><br>
            
            <label>Data da devolução: </label>
            <input id="formatacaoForm" type="date" id="dataDevolucao" name="dataDevolucao" required><br>
            
            <button type="submit" name="submit">Enviar</button>
        </form>
    </div>    
    </body>
</html>