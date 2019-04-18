<?php
    require_once '../Classes/Autor.php';
    require_once '../Classes/Editora.php';
    require_once '../Classes/Genero.php';
    require_once '../DAO/AutorDAO.php';
    require_once '../DAO/EditoraDAO.php';
    require_once '../DAO/GeneroDAO.php';
?>
<html lang="pt-br">    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <title>Pagina Inicial</title>        
    </head>
    
    <body> 
    <header>
        <nav><ul class="ul">                
            <li class="li"><a href="MenuFuncionario.html">Menu do Funcionario</a></li>
            <li class="li"><a href="Login.html">Login</a></li>
            <li class="li"><a href="Index.html">Home</a></li>
        </ul></nav>
    </header> 
    <div>
        <form action="#" method="post">
      
            <label>Livro: </label>
            <input type="text" id="nomeLivro" name="nomeLivro" required><br> 
            <?php
                $autorDAO = new autorDAO(new Autor());
                $editoraDAO = new EditoraDAO(new Editora());
                $generoDAO = new GeneroDAO(new Genero());
            ?>
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
            <select name="cbAutor">
                <option value="null">Selecione...</option>
                <?php
                    foreach($editoraDAO->findAll() as $key => $value):
                        echo "<option value=$value->edi_id>$value->edi_nome</option>";
                    endforeach;
                ?>
            </select><br>

            <label>Genero: </label>
            <select name="cbAutor">
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
            <input type="text" id="cidade" name="cidade" value=1 required><br>
            
            <label>Edição: </label>
            <input type="number" id="edicao" name="edicao" min="1" required><br>
            
            <button type="submit" name="submit">Enviar</button>
   
        </form>
    </div>    
             
    </body>
</html>
        