<html lang="pt-br">    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <title>Página inicial</title>        
    </head>
    
    <body> 
        <header>
            <nav><ul class="ul">                
                 <li class="li"><a href="MenuFuncionario.php">Página inicial</a></li>
                 <li class="li"><a href="Index.php">Login(apagar esse btn dps)</a></li>
            </ul></nav>
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
                    <li><a href="Emprestimo.php">Empréstimo</a></li>
                    <li><a href="EditarLivro.php">Editar livro cadastrado</a></li>
                    <li><a href="ListarLeitor.php">Leitores cadastrados</a></li>
                    <li><a href="ListarLivro.php">Livros cadastrados</a></li>
                </td>            
            </table>                
        </div>  

        
        <div id="divBusca" style="float: left; width: 80%">
            <input type="text" id="txtBusca" placeholder="Buscar..."/>
            <button id="btnBusca">Buscar</button>        
        </div>        
    </body> 
</html>