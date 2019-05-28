<?php

require_once '../Classes/Autor.php';
require_once '../Classes/Editora.php';
require_once '../Classes/Genero.php';
require_once '../Classes/EstadoLivro.php';
require_once '../DAO/AutorDAO.php';
require_once '../DAO/EditoraDAO.php';
require_once '../DAO/GeneroDAO.php';
require_once '../DAO/EstadoLivroDAO.php';


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
        <link rel="stylesheet" type="text/css" href="_css/stylelivro.css">
        <link rel="stylesheet" type="text/css" href="_css/estilohome.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Livros</title>        
    </head>
    
    <body> 
    <div id="caixamenu"> 
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="CadastroLeitor.php">Leitores</a>
            <a href="CadastroLivro.php">Livros</a>
            <a href="Emprestimo.php">Empréstimos</a>
            <a href="RegistrarDevolucao.php">Devolução</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="CadastroEditora.php">Editoras</a>
            <a href="CadastroAutor.php">Autores</a>             
        </div>
    </div>  
    <div class="titulo"> Cadastro de Leitor </div>     
        <div class="caixaform">
            <form action="../Control/cadLivro.php" method="post">

                <label>Livro: </label>
                <input class="campo" type="text" id="nomeLivro" name="nomeLivro" size="60" required><br> <br>
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

                <label style="margin-left: 20px;" >Editora:</label>
                <select class="campo" name="cbEditora">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($editoraDAO->findAll() as $key => $value):
                            echo "<option value=$value->edi_id>$value->edi_nome</option>";
                        endforeach;
                    ?>
                </select>

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
        