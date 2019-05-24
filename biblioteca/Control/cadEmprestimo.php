<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../View/Index.php");
    exit;
}

require_once "../Classes/Emprestimo.php";
require_once "../DAO/EmprestimoDAO.php";

$emprestimo = new Emprestimo();

$emprestimo->setLeitor($_POST['leitorEscolhido']);
$emprestimo->setLivro($_POST['livroEscolhido']);
$emprestimo->setFuncionario($_SESSION['id']);
$emprestimo->setData($_POST['dataRetirada']);
$emprestimo->setDataDevolucao($_POST['dataDevolucao']);

$dao = new EmprestimoDAO($emprestimo);

if($dao->insert()){
    header("Location: ../View/ListarLivro.php");
}
