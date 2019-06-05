<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}

require_once "../Classes/Leitor.php";
require_once "../Classes/Livro.php";
require_once "../Classes/Emprestimo.php";
require_once "../DAO/LeitorDAO.php";
require_once "../DAO/LivroDAO.php";
require_once "../DAO/EmprestimoDAO.php";

$leitorDAO = new LeitorDAO(new Leitor());
$livroDAO = new LivroDAO(new Livro());
$emprestimoDAO = new EmprestimoDAO(new Emprestimo());

?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/styleinicio.css">
        <link rel="stylesheet" type="text/css" href="_css/styleforms.css">
        <link href="_css/modal.css" rel="stylesheet" type="text/css">
        <script src="_js/script.js"></script>
        <script type="text/javascript" src="_js/jquery-3.2.1.min.js"></script>
	       <script type="text/javascript" src="_js/janela.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Página Inicial</title>
    </head>

    <body>
      <div style="height: 250px; width: 600px;"class="window" id="fechar">
          <div style="margin-left: 220px; margin-top: 40px;"class="titulomodal">Corfimação</div><br><br><br>
          <div class="formulario">
              <div style="margin-left:130px; margin-top: 10px;"class="confirma">Tem certeza que deseja sair da biblioteca?</div><br><br>
              <a style="border: none;" href="MenuFuncionario.php" ><button style="float: left; margin-left: 80px;" class="botao">Cancelar</button></a>
              <a style="border: none;" href="../index.php"><button style="margin-left: 300px; margin-top: -30px;" class="botao">Confirmar</button></a>
        </div>
      </div>
        <div id="mascara"></div>

    <div id="caixamenu">
    <div id="logo"><img src="_img/logo-branco.png" width="50px" height="50px"></div>
        <div class="nome">Biblioteca</div>
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="ListarLeitor.php">Leitores</a>
            <a href="ListarLivro.php">Livros</a>
            <a href="ListarEmprestimos.php">Empréstimos</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="#fechar" rel="Modal">Sair</a>

        </div>
    </div>
        <br>
        <div class="caixa">
            <div class="texto"> Bem vindo(a): <?php echo $_SESSION['nome']?></div>
        </div>
        <div class="estatisticas">Leitores Cadastrados: <?php echo $leitorDAO->getQuantidadeLeitores()['conta']?></div>
        <div class="estatisticas">Livros Cadastrados: <?php echo $livroDAO->getQuantidadeLivros()['conta']?></div>
        <div class="estatisticas">Empréstimos atrasados: <?php echo $emprestimoDAO->getQuantidadeAtrasodo()['conta']?></div>
        <div class="estatisticas">Empréstimos entregues: <?php echo $emprestimoDAO->getQuantidadeNaoAtrasados()['conta']?></div>
        <div class="estatisticas">Total de empréstimos realizados:
            <?php
                echo $emprestimoDAO->getQuantidadeNaoAtrasados()['conta'] + $emprestimoDAO->getQuantidadeAtrasodo()['conta'];
            ?>
        </div>
        <div class="estatisticas">Quantidade de exemplares: <?php echo $livroDAO->getQuantidadeExemplares()['conta']?></div>
    </body>
</html>
