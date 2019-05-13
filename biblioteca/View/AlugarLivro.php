<?php

    require_once '../Classes/Leitor.php';
    require_once '../Classes/Endereco.php';
    require_once '../Classes/Telefone.php';
    require_once '../DAO/LeitorDAO.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="_css/estilo.css">
    <title>Leitores cadastrados</title>
    <link rel="stylesheet" href="_css/estilo.css" type="text/css">
</head>

<body>
<header>
    <nav>
        <ul class="ul">
            <li class="li"><a href="MenuFuncionario.php">Página inicial</a></li>
        </ul>
    </nav>
</header>
<div style="float: left; width: 20%">
    <table border=1>
        <td>
            <li><a href="CadastroAutor.php">Cadastrar autor</a></li>
            <li><a href="CadastroEditora.php">Cadastrar editora</a></li>
            <li><a href="CadastroLivro.php">Cadastrar livro</a></li>
            <li><a href="CadastroLeitor.php">Cadastrar Usuário</a></li>
            <li><a href="CadastroFuncionario.php">Cadastrar funcionário</a></li>
            <li><a href="Emprestimo.php">Empréstimos</a></li>
            <li><a href="EditarLivro.php">Editar livro cadastrado</a></li>
            <li><a href="ListarLeitor.php">Leitores cadastrados</a></li>
            <li><a href="ListarLivro.php">Livros cadastrados</a></li>
        </td>
    </table>
    <form action="#" method="post">
        <label>Nome do Livro</label>
        <input type="search" id="livro" name="livro">
    </form>


?>