<?php

require_once '../Classes/Leitor.php';
require_once '../Classes/Endereco.php';
require_once '../Classes/Telefone.php';
require_once '../DAO/LeitorDAO.php';


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
        <title>Leitores cadastrados</title>
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
        <?php
            $leitorDAO = new LeitorDAO(new Leitor());
        ?>
        <table id="stusuarios">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Sexo</td>
                    <td>Data de Nascimento</td>
                    <td>Tipo do Numero</td>
                    <td>Numero</td>
                    <td>Endereço</td>
                    <td>Opção</td>
                </tr>
            </thead>
            <?php foreach($leitorDAO->selectAll() as $key => $value):?>
              <tbody>
                  <tr>
                      <td><?php echo $value->lei_nome;?></td>
                      <td><?php echo $value->lei_email;?></td>
                      <td><?php echo $value->lei_sexo;?></td>
                      <td><?php echo $value->lei_dtnasc;?></td>
                      <td><?php echo $value->tip_tel_tipo;?></td>
                      <td><?php echo $value->tel_numero;?></td>
                      <td><?php echo $value->end_rua.", ".$value->end_numero.", ".
                                     $value->end_bairro.", ".$value->end_cidade."-".
                                     $value->end_estado;?></td>
                      <td>
                          <form action="../Control/delLeitor.php" method="post">
                              <input type="hidden" name="idDeletar" value="<?php echo $value->lei_id?>">
                              <input type="submit" value="Deletar">
                          </form>
                          <form action="../View/AlterarLeitor.php" method="post">
                              <input type="hidden" name="idAlterar" value="<?php echo $value->lei_id?>">
                              <input type="submit" value="Alterar">
                          </form>
                      </td>
                  </tr>
              </tbody>
            <?php endforeach; ?>
        </table>
        
        <form action="CadastroLeitor.php">
            <input type="submit" value="Novo Cadastro">
        </form>
        
        </div>
    </body>
</html>
        