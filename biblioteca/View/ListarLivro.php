<?php

require_once '../Classes/Livro.php';
require_once '../DAO/LivroDAO.php';

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
        <title>Livros cadastrados</title>
        <style>
            #stusuarios {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            #stusuarios td, #stusuarios th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            #stusuarios tr:nth-child(even){background-color: #f2f2f2;}

            #stusuarios tr:hover {background-color: #ddd;}

            #stusuarios th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>        
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
                    <li><a href="Emprestimo.php">Empréstimo</a></li>
                    <li><a href="EditarLivro.php">Editar livro cadastrado</a></li>
                    <li><a href="ListarLeitor.php">Leitores cadastrados</a></li>
                    <li><a href="ListarLivro.php">Livros cadastrados</a></li>
                </td>

            </table>

        </div>  

        <div id="divBusca" style="float: left; width: 80%">
        <?php
            $livroDAO = new LivroDAO(new Livro());
        ?>
        <table id="stusuarios">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Autor</td>
                    <td>Editora</td>
                    <td>Genero</td>
                    <td>Estado</td>
                    <td>Data de Publicação</td>
                    <td>Edição</td>
                    <td>ISBD</td>
                    <td>Editar</td>
                    <td>Deletar</td>
                </tr>
            </thead>
            <?php foreach($livroDAO->selectAll() as $key => $value):?>
                <tbody>
                    <tr>
                        <td><?php echo $value->liv_id;?></td>
                        <td><?php echo $value->liv_nome;?></td>
                        <td><?php echo $value->aut_nome;?></td>
                        <td><?php echo $value->edi_nome;?></td>
                        <td><?php echo $value->gen_genero;?></td>
                        <td><?php echo $value->est_liv_estado;?></td>
                        <td><?php echo $value->liv_ano_publicacao;?></td>
                        <td><?php echo $value->liv_edicao;?></td>
                        <td><?php echo $value->liv_isbd;?></td>
                        <td>
                            <form action="EditarLivro.php" method="POST">
                                <input type="hidden" value=<?php echo $value->liv_id;?> name="id">
                                <input type="submit" value="Editar">
                            </form>
                        </td>
                        <td>
                            <form action="#" method="POST">
                                <input type="hidden" value=<?php echo $value->liv_id;?> name="id">
                                <input type="submit" value="Deletar">
                            </form>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
             </div> 
        <form action="CadastroLivro.php">
            <input type="submit" value="Novo Cadastro">
        </form>
    </body>
</html>
        