<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}
require_once '../Classes/Livro.php';
require_once '../DAO/LivroDAO.php';
?>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/styleinicio.css">
        <link rel="stylesheet" type="text/css" href="_css/styletable.css">
        <link href="_css/modal.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="_css/styleforms.css">
        <script src="_js/script.js"></script>
        <script type="text/javascript" src="_js/jquery-3.2.1.min.js"></script>
	      <script type="text/javascript" src="_js/janela.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Livros</title>
    </head>

    <body>
      <div style="height: 250px; width: 600px;"class="window" id="fechar">
          <div style="margin-left: 220px; margin-top: 40px;"class="titulomodal">Corfimação</div><br><br><br>
          <div class="formulario">
              <div style="margin-left:130px; margin-top: 10px;"class="confirma">Tem certeza que deseja sair da biblioteca?</div><br><br>
              <a style="border: none;" href="ListarLivro.php" ><button style="float: left; margin-left: 80px;" class="botao">Cancelar</button></a>
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

        <div class="titulo">Livros</div>
            <form class="novo" action="CadastroLivro.php">
                <input class="new" type="submit" value="Novo Livro">
            </form>
            <?php
                $livroDAO = new LivroDAO(new Livro());
            ?>
            <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th>Nome</th>
                                    <th>Autor</th>
                                    <th>Editora</th>
                                    <th>Genero</th>
                                    <th>Estado</th>
                                    <th>Data de Publicação</th>
                                    <th>Edição</th>
                                    <th>ISBD</th>
                                    <th>Qntd</th>
                                    <th>Disponivel</th>
                                    <th>Editar</th>
                                    <th>Deletar</th>
                                </tr>
                            </thead>
                <?php foreach($livroDAO->selectAll() as $key => $value):?>
                    <tbody>
                        <tr>
                            <td><?php echo $value->liv_nome;?></td>
                            <td><?php echo $value->aut_nome;?></td>
                            <td><?php echo $value->edi_nome;?></td>
                            <td><?php echo $value->gen_genero;?></td>
                            <td><?php echo $value->est_liv_estado;?></td>
                            <td><?php echo $value->liv_ano_publicacao;?></td>
                            <td><?php echo $value->liv_edicao;?></td>
                            <td><?php echo $value->liv_isbd;?></td>
                            <td><?php echo $value->liv_quantidade;?></td>
                            <td><?php echo $value->liv_qntd_disponivel;?></td>
                            <td>
                                <form action="EditarLivro.php" method="POST">
                                    <input type="hidden" value=<?php echo $value->liv_id;?> name="id">
                                    <input class="img" type="image" src="_img/editar.png"/>
                                </form>
                            </td>
                            <td>
                                <form action="../Control/delLivro.php" method="POST">
                                    <input type="hidden" value="<?php echo $value->liv_id;?>" name="id">
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
