<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}
require_once '../Classes/Emprestimo.php';
require_once '../DAO/EmprestimoDAO.php';
$dao = new EmprestimoDAO(new Emprestimo());
?>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/stylehome.css">
        <link rel="stylesheet" type="text/css" href="_css/styletable.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Empréstimos</title>
    </head>

        <body>
        <div id="caixamenu">
        <div id="logo"><img src="_img/logobranco.png" width="50px" height="50px"></div>
        <div class="nome">Biblioteca</div>
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="ListarLeitor.php">Leitores</a>
            <a href="ListarLivro.php">Livros</a>
            <a href="ListarEmprestimos.php">Empréstimos</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="../index.php">Sair</a>
        </div>
    </div>

    <div class="titulo">EMPRÉSTIMOS</div>
    <form class="novo" action="Emprestimo.php">
            <input class="new" type="submit" value="Novo Empréstimo">
        </form>
    <div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
                                <th>Leitor</th>
                                <th>Livro</th>
                                <th>Funcionário</th>
                                <th>Data de SaÍda</th>
                                <th>Data Limite</th>
                                <th>Devolução</th>
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
                              <input class="campo" type="date" name="dataEntrega" required>
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
