<?php
    require_once '../Classes/Leitor.php';
    require_once '../Classes/Endereco.php';
    require_once '../Classes/Telefone.php';
    require_once '../DAO/LeitorDAO.php';
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
                  </tr>
              </tbody>
            <?php endforeach; ?>
        </table>
        <form action="CadastroLeitor.html">
            <input type="submit" value="Novo Cadastro">
        </form>
    </body>
</html>
        