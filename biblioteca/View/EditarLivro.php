<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: index.php");
    exit;
}
require_once "../Classes/Livro.php";
require_once '../Classes/Autor.php';
require_once '../Classes/Editora.php';
require_once '../Classes/Genero.php';
require_once '../Classes/EstadoLivro.php';
require_once "../DAO/LivroDAO.php";
require_once '../DAO/AutorDAO.php';
require_once '../DAO/EditoraDAO.php';
require_once '../DAO/GeneroDAO.php';
require_once '../DAO/EstadoLivroDAO.php';

$dao = new LivroDAO(new Livro());

$livroPegoPeloId = $dao->select($_POST['id']);

?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/styleforms.css">
        <link rel="stylesheet" type="text/css" href="_css/styleinicio.css">
        <link href="_css/modal.css" rel="stylesheet" type="text/css">
        <!-- <link rel="stylesheet" type="text/css" href="_css/elements.css"> -->
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
              <a style="border: none;" href="EditarLivro.php" ><button style="float: left; margin-left: 80px;" class="botao">Cancelar</button></a>
              <a style="border: none;" href="../index.php"><button style="margin-left: 300px; margin-top: -30px;" class="botao">Confirmar</button></a>
        </div>
      </div>
        <div id="mascara"></div>
    <div class="window" id="autor">
    <a href="#" class="fechar">Fechar</a>
        <div class="titulomodal">Cadastro de Autor</div><br><br><br>
        <div class="formulario">
        <form action="../Control/cadAutor.php" method="post">
                <label style="margin-left: 25px;">Nome: </label>
                <input class="campo" type="text" size="25" id="nome" name="nome" required>
                <label style="margin-left: 20px;">Data de Nascimento: </label>
                <input class="campo" type="date" id="dtnasc" name="dtnasc"  required><br><br>
                <div class="group" style="margin-left: 25px;">
                <label style="margin-right: 10px;">Sexo: </label>
                    <input type="radio" name="sexo" value="F" id="rb1" />
                    <label class="sexo" for="rb1">Feminino</label>
                    <input type="radio" name="sexo" value="M" id="rb2" />
                    <label class="sexo" for="rb2">Masculino</label>
                </div>
                <br><br><br>
            <button style="margin-left: 200px;"class="botao" type="submit" name="submit">Cadastrar</button>
            </form>
      </div>
    </div>
      <div id="mascara"></div>

      <div style="height: 250px;"class="window" id="editora">
      <a href="#" class="fechar">Fechar</a>
          <div class="titulomodal">Cadastro de Editora</div><br><br><br><br>
          <div class="formulario">
          <form action="../Control/cadEditora.php" method="post">
              <label style="margin-left: 80px; margin-right: 5px;">Nome da Editora:</label>
              <input class="campo" type="text" size="40" id="nome" name="nome" required><br><br>
              <button style="margin-left: 220px;" class="botao" type="submit" name="submit">Cadastrar</button>
          </form>
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
    <div class="titulo"> Cadastro de Livros </div>
        <div class="caixaform">
            <form action="../Control/ediLivro.php" method="post">
              <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
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
                            if($value->aut_nome == $livroPegoPeloId['aut_nome']){
                                echo "<option value=$value->aut_id selected>$value->aut_nome</option>";
                            }else {
                                echo "<option value=$value->aut_id>$value->aut_nome</option>";
                            }
                        endforeach;
                    ?>
                </select>
                <a style="border:none;" href="#autor" rel="Modal"><button class="pop" type="text">Novo</button></a>
                <label style="margin-left: 20px;" >Editora:</label>
                <select class="campo" name="cbEditora">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($editoraDAO->findAll() as $key => $value):
                            if($value->edi_nome == $livroPegoPeloId['edi_nome']){
                                echo "<option value=$value->edi_id selected>$value->edi_nome</option>";
                            }else{
                                echo "<option value=$value->edi_id>$value->edi_nome</option>";
                            }

                        endforeach;
                    ?>
                </select>
                <a style="border: none;" href="#editora" rel="Modal"><button class="pop" type="text">Novo</button></a><br><br>
                <label>Livro: </label>
                <input class="campo" type="text" size="50" name="nomeLivro" value="<?php echo $livroPegoPeloId['liv_nome']?>" required>
                <label style="margin-left: 20px;">Gênero: </label>
                <select class="campo" name="cbGenero">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($generoDAO->findAll() as $key => $value):
                            if($value->gen_genero == $livroPegoPeloId['gen_genero']){
                                echo "<option value=$value->gen_id selected>$value->gen_genero</option>";
                            }else {
                                echo "<option value=$value->gen_id>$value->gen_genero</option>";
                            }
                        endforeach;
                    ?>
                </select><br><br>

                <label>Ano de Publicação: </label>
                <input class="campo" type="date" id="AnoPublicacao" name="AnoPublicacao"
                       value="<?php echo $livroPegoPeloId['liv_ano_publicacao']?>">
                <label style="margin-left: 15px;">Estado do livro: </label>
                <select class="campo" name="cbEstadoLivro">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($estadoLivroDAO->findAll() as $key => $value):
                            if($value->est_liv_estado == $livroPegoPeloId['est_liv_estado']){
                                echo "<option value=$value->est_liv_id selected>$value->est_liv_estado</option>";
                            }else{
                                echo "<option value=$value->est_liv_id>$value->est_liv_estado</option>";
                            }

                        endforeach;
                    ?>
                </select>
                <label style="margin-left: 10px;">Edição: </label>
                <input class="campo" type="number" id="edicao" name="edicao" min="1" value="<?php echo $livroPegoPeloId['liv_edicao']?>" required><br><br>

                <label>Isbd: </label>
                <input class="campo" type="text" id="isbd" name="isbd" maxlength="10" value="<?php echo $livroPegoPeloId['liv_isbd']?>" required>

                <label style="margin-left: 20px;" for="quantidade">Quantidade de livros: </label>
                <input class="campo" type="number" id="quantidade" name="quantidade" maxlength="2"
                       value="<?php echo $livroPegoPeloId['liv_quantidade']?>" required><br><br>
                <button class="botao" type="submit" name="submit">Editar</button>

            </form>


        </div>

    </body>
</html>
