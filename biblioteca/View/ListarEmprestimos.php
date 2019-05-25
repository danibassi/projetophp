<?php

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: Index.php");
    exit;
}

require_once '../Classes/Emprestimo.php';
require_once '../DAO/EmprestimoDAO.php';

$dao = new EmprestimoDAO(new Emprestimo());

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
        <table id="stusuarios">
            <thead>
                <tr>
                    <td>Leitor</td>
                    <td>Livro</td>
                    <td>Funcionario</td>
                    <td>Data de Saida</td>
                    <td>Data Limite</td>
                    <td>Devolução</td>
                </tr>
            </thead>
            <?php foreach($dao->selectEmprestimoPendente() as $key => $value):?>
              <tbody>
                  <tr>
                      <td><?php echo $value->lei_nome;?></td>
                      <td><?php echo $value->liv_nome;?></td>
                      <td><?php echo $value->fun_nome;?></td>
                      <td><?php echo $value->emp_data;?></td>
                      <td><?php echo $value->emp_data_devolucao;?></td>
                      <td>
                          <form action="../Control/devolucaoLivro.php" method="post">
                              <input type="hidden" name="idEntrega" value="<?php echo $value->emp_id?>">
                              <input type="hidden" name="livroEntregue" value="<?php echo $value->liv_nome?>">
                              <input type="date" name="dataEntrega" required>
                              <input type="submit" value="Devolução">
                          </form>
                      </td>

                  </tr>
              </tbody>
            <?php endforeach; ?>
        </table>
        
        <form action="Emprestimo.php">
            <input type="submit" value="Novo Cadastro">
        </form>
        
        </div>
    </body>
</html>
        