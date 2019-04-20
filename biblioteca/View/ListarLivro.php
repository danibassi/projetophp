<?php
    require_once '../Classes/Livro.php';
    require_once '../DAO/LivroDAO.php';
?>
<html lang="pt-br">    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <title>Leitores Cadastrados</title>
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
                    <li class="li"><a href="MenuFuncionario.html">Menu do Funcionario</a></li>
                    <li class="li"><a href="Login.php">Login</a></li>
                    <li class="li"><a href="Index.php">Home</a></li>
                </ul>
            </nav>
        </header>
        
        <?php
            $livroDAO = new LivroDAO(new Livro());
        ?>
        <table id="stusuarios">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Autor</td>
                    <td>Editora</td>
                    <td>Genero</td>
                    <td>Ano de Publicação</td>
                    <td>Estado do Livro</td>
                    <td>Edição</td>
                    <td>ISBD</td>
                    <td>Editar</td>
                    <td>Deletar</td>
                </tr>
            </thead>
            <form action="EditaLivro.php" method="POST">
            <?php foreach($livroDAO->selectAll() as $key => $value):?>
                <tbody>
                    <tr>
                        <td><?php echo $value->liv_nome;?></td>
                        <td><?php echo $value->aut_nome;?></td>
                        <td><?php echo $value->edi_nome;?></td>
                        <td><?php echo $value->gen_genero;?></td>
                        <td><?php echo $value->liv_ano_publicacao;?></td>
                        <td><?php echo $value->est_liv_estado;?></td>
                        <td><?php echo $value->liv_edicao;?></td>
                        <td><?php echo $value->liv_isbd;?></td>
                        <td>
                            <form action="EditaLivro.php" method="POST">      
                                <input type="hidden" value=<?php echo $value->liv_id;?> name="id">
                                <input type="submit" value="Editar">
                            </form>
                        </td>
                        <td>
                            <form action="../Control/editLivro.php" method="POST">      
                                <input type="hidden" value=<?php echo $value->liv_id;?> name="id">
                                <input type="submit" value="Deletar">
                            </form>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
            
        </table>
        <form action="CadastroLeitor.html">
            <input type="submit" value="Novo Cadastro">
        </form>
    </body>
</html>
        