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
        <link rel="stylesheet" type="text/css" href="_css/stylehome.css">
        <link rel="stylesheet" type="text/css" href="_css/styletable.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Leitores</title>
    </head>
    
        <body> 
        <div id="caixamenu"> 
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="ListarLeitor.php">Leitores</a>
            <a href="ListarLivro.php">Livros</a>
            <a href="ListarEmprestimos.php">Empréstimos</a>
            <a href="RegistrarDevolucao.php">Devolução</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="CadastroEditora.php">Editoras</a>
            <a href="CadastroAutor.php">Autores</a>             
        </div>
    </div>  

    <div class="titulo">LEITORES</div>
        <form class="novo" action="CadastroLeitor.php">
            <input class="new" type="submit" value="Novo Leitor">
        </form>
        <?php
            $leitorDAO = new LeitorDAO(new Leitor());
        ?>
        <div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Sexo</th>
                                <th>Data de Nascimento</th>
                                <th>Tipo de Telefone</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>Opção</th>
                            </tr>
                        </thead>
            <?php foreach($leitorDAO->selectAll() as $key => $value):?>
              <tbody>
                  <tr class="cadastro">
                      <td class="colunas"><?php echo $value->lei_nome;?></td>
                      <td class="colunas"><?php echo $value->lei_email;?></td>
                      <td class="colunas"><?php echo $value->lei_sexo;?></td>
                      <td class="colunas"><?php echo $value->lei_dtnasc;?></td>
                      <td class="colunas"><?php echo $value->tip_tel_tipo;?></td>
                      <td class="colunas"><?php echo $value->tel_numero;?></td>
                      <td class="colunas"><?php echo $value->end_rua.", ".$value->end_numero.", ".
                                     $value->end_bairro.", ".$value->end_cidade."-".
                                     $value->end_estado;?></td>
                      <td class="colunas">
                          <form id="encima" action="EditarLeitor.php" method="post">
                              <input type="hidden" name="idAlterar" value="<?php echo $value->lei_id?>">
                              <input class="img" type="image" src="_img/editar.png"/>
                          </form>
                          <form  action="../Control/delLeitor.php" method="post">
                              <input type="hidden" name="idDeletar" value="<?php echo $value->lei_id?>">
                              <input class="img" type="image" src="_img/excluir.png"/>
                          </form>
                      </td>
                     

                  </tr>

              </tbody>
              
            <?php endforeach; ?>
        </table>
    </div>
</div>
</div>        
        </div>
    </body>
</html>
        