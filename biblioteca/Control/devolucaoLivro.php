<?php

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}

require_once '../Classes/Emprestimo.php';
require_once '../DAO/EmprestimoDAO.php';

$emprestimo  = new Emprestimo();

$emprestimo->setDataEntrega($_POST['dataEntrega']);
$emprestimo->setLivro($_POST['livroEntregue']);

$dao = new EmprestimoDAO($emprestimo);

if($dao->devolucao($_POST['idEntrega'])){
    header("Location: ../View/ListarEmprestimos.php");
}