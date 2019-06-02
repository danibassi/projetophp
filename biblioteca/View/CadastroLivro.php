<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}
require_once '../Classes/Autor.php';
require_once '../Classes/Editora.php';
require_once '../Classes/Genero.php';
require_once '../Classes/EstadoLivro.php';
require_once '../DAO/AutorDAO.php';
require_once '../DAO/EditoraDAO.php';
require_once '../DAO/GeneroDAO.php';
require_once '../DAO/EstadoLivroDAO.php';
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/stylecadastro.css">
        <link rel="stylesheet" type="text/css" href="_css/Home.css">
        <link href="_css/popUp.css" rel="stylesheet" type="text/css">
        <!-- <link rel="stylesheet" type="text/css" href="_css/elements.css"> -->
        <script src="_js/script.js"></script>
        <script type="text/javascript" src="_js/jquery-3.2.1.min.js"></script>
	    <script type="text/javascript" src="_js/janela.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Livros</title>
    </head>

    <body>
    <div class="window" id="autor">
    <a href="#" class="fechar">Fechar</a>
        <div class="titulomodal">Cadastro de Autor</div><br><br><br>
        <div class="formulario">
        <form action="../Control/cadAutor.php" method="post">

                <label style="margin-left: 25px;">Nome: </label>
                <input class="campo" type="text" size="25" id="nome" name="nome" required>

                <label style="margin-left: 20px;">Data de Nascimento: </label>
                <input class="campo" type="date" id="dtnasc" name="dtnasc"  required><br><br>

                <div class="group">
                <label style="margin-right: 10px;">Sexo: </label>
                    <input type="radio" name="sexo" value="F" id="rb1" />
                    <label class="sexo" for="rb1">Feminino</label>
                    <input type="radio" name="sexo" value="M" id="rb2" />
                    <label class="sexo" for="rb2">Masculino</label>
                </div>

                <button class="botao" type="submit" name="submit">Enviar</button>
            </form>
      </div>
    </div>
      <div id="mascara"></div>

      <div class="window" id="editora">
      <a href="#" class="fechar">Fechar</a>
          <hr>
          <h1 class="h1-logo modal2">Cadastro de Editora</h1>
          <form action="../Control/cadEditora.php" method="post">
              <label>Nome: </label>
              <input type="text" id="nome" name="nome" required><br>
              <button type="submit" name="submit">Enviar</button>
          </form>
        </div>
        <div id="mascara"></div>

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
    <div class="titulo"> Cadastro de Livros </div>
        <div class="caixaform">
            <form action="../Control/cadLivro.php" method="post">
              <?php
                  $autorDAO = new autorDAO(new Autor());
                  $editoraDAO = new EditoraDAO(new Editora());
                  $generoDAO = new GeneroDAO(new Genero());
                  $estadoLivroDAO = new EstadoLivroDAO(new EstadoLivro());
              ?>
                <label>Autor: </label>
                <select class="campo" name="cbAutor">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($autorDAO->findAll() as $key => $value):
                            echo "<option value=$value->aut_id>$value->aut_nome</option>";
                        endforeach;
                    ?>
                </select>
                <a href="#autor" rel="Modal"><button type="text">Novo</button></a>
                <label style="margin-left: 20px;" >Editora:</label>
                <select class="campo" name="cbEditora">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($editoraDAO->findAll() as $key => $value):
                            echo "<option value=$value->edi_id>$value->edi_nome</option>";
                        endforeach;
                    ?>
                </select>
                <a href="#editora" rel="Modal"><button type="text">Novo</button></a><br><br>
                <label>Livro: </label>
                <input class="campo" type="text" id="nomeLivro" name="nomeLivro" size="50" required>
                <label style="margin-left: 20px;">Gênero: </label>
                <select class="campo" name="cbGenero">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($generoDAO->findAll() as $key => $value):
                            echo "<option value=$value->gen_id>$value->gen_genero</option>";
                        endforeach;
                    ?>
                </select><br><br>

                <label>Ano de Publicação: </label>
                <input class="campo" type="date" id="AnoPublicacao" name="AnoPublicacao">

                <label style="margin-left: 15px;">Estado do livro: </label>
                <select class="campo" name="cbEstadoLivro">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($estadoLivroDAO->findAll() as $key => $value):
                            echo "<option value=$value->est_liv_id>$value->est_liv_estado</option>";
                        endforeach;
                    ?>
                </select>
                <label style="margin-left: 10px;">Edição: </label>
                <input class="campo" type="number" id="edicao" name="edicao" min="1" required><br><br>

                <label>Isbd: </label>
                <input class="campo" type="text" id="isbd" name="isbd" maxlength="10" required>

                <label style="margin-left: 20px;" for="quantidade">Quantidade de livros: </label>
                <input class="campo" type="number" id="quantidade" name="quantidade" maxlength="2" required><br><br>

                <button class="botao" type="submit" name="submit">Cadastrar</button>

            </form>


        </div>

    </body>
</html>
