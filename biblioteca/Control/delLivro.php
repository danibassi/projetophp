<?php

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../View/Index.php");
    exit;
}

require_once "../Classes/Livro.php";
require_once "../DAO/LivroDAO.php";

$dao = new LivroDAO(new Livro());

if($dao->delete($_POST['id'])){
    header("Location: ../View/ListarLivro.php");
}