<?php
    require_once '../Classes/Livro.php';
    require_once '../DAO/LivroDAO.php';
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
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <title>Cadastro de Livro</title>        
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
                $livroDAO = new LivroDAO(new Livro());
                $livro = $livroDAO->select($_POST['id']);
                $autorDAO = new autorDAO(new Autor());
                $editoraDAO = new EditoraDAO(new Editora());
                $generoDAO = new GeneroDAO(new Genero());
                $estadoLivroDAO = new EstadoLivroDAO(new EstadoLivro());
            ?>
        <div>
            <form action="../Control/cadLivro.php" method="post">
        
                <label>Livro: </label>
                <input type="text" id="nomeLivro" name="nomeLivro" value=<?php echo $livro['liv_nome']; ?> required><br> 
                
                <label>Autor: </label>
                <select name="cbAutor">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($autorDAO->findAll() as $key => $value):
                            echo "<option value=$value->aut_id>$value->aut_nome</option>";
                        endforeach;
                    ?>
                </select><br>
                
                <label>Editora:</label>
                <select name="cbEditora">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($editoraDAO->findAll() as $key => $value):
                            echo "<option value=$value->edi_id>$value->edi_nome</option>";
                        endforeach;
                    ?>
                </select><br>

                <label>Genero: </label>
                <select name="cbGenero">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($generoDAO->findAll() as $key => $value):
                            echo "<option value=$value->gen_id>$value->gen_genero</option>";
                        endforeach;
                    ?>
                </select><br>
        
                <label>Ano de Publicação: </label>
                <input type="date" id="AnoPublicacao" name="AnoPublicacao"><br>
            
                <label>Estado do livro: </label>
                <select name="cbEstadoLivro">
                    <option value="null">Selecione...</option>
                    <?php
                        foreach($estadoLivroDAO->findAll() as $key => $value):
                            echo "<option value=$value->est_liv_id>$value->est_liv_estado</option>";
                        endforeach;
                    ?>
                </select><br>
                <label>Edição: </label>
                <input type="number" id="edicao" name="edicao" min="1" required><br>
                
                <label>Isbd: </label>
                <input type="text" id="isbd" name="isbd" maxlength="10" required><br>
                
                <button type="submit" name="submit">Enviar</button>
    
            </form>
        </div>
    </body>
</html>
        