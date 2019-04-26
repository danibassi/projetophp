<?php
    require_once '../DAO/LivroDAO.php';
    require_once '../Classes/Livro.php';
    require_once '../Classes/Autor.php';
    require_once '../Classes/Genero.php';
    require_once '../Classes/EstadoLivro.php';
    require_once '../Classes/Editora.php';

    $livro = new Livro();
    $livro->setNome($_POST['nomeLivro']);
    $livro->setAnoPublicacao($_POST['AnoPublicacao']);
    $livro->setEdicao($_POST['edicao']);
    $livro->setIsbd($_POST['isbd']);
    
    $editora = new Editora();
    $editora->setEditoraNome($_POST['cbEditora']);

    $estadoLivro = new EstadoLivro();
    $estadoLivro->setEstado($_POST['cbEstadoLivro']);

    $genero = new Genero();
    $genero->setGenero($_POST['cbGenero']);

    $autor = new Autor();
    $autor->setNome($_POST['cbAutor']);

    $livro->setEditora($editora);
    $livro->setEstadoLivro($estadoLivro);
    $livro->setGenero($genero);
    $livro->setAutor($autor);

    $livroDAO = new LivroDAO($livro);
    
    echo $_POST['id'];

    
    if($livroDAO->update($_POST['id'])){
        header("Location: ../View/ListarLivro.php");
    }else{
    
    }
    
?>