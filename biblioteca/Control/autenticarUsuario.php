<?php

require_once "../Classes/Funcionario.php";
require_once "../DAO/FuncionarioDAO.php";

$funcionario = new Funcionario();

$funcionario->setEmail($_POST['username']);
$funcionario->setPassword($_POST['password']);

//echo $funcionario->getEmail()." ".$_POST['username'];

if(session_status() != PHP_SESSION_ACTIVE){
    session_cache_expire(60);
    session_start();
}

$dao = new funcionarioDAO($funcionario);

$dadosAutenticados = $dao->getNomeEmailAndPassword();

if($funcionario->getPassword() == $dadosAutenticados['fun_password']){
    $_SESSION['id'] = $dadosAutenticados['fun_id'];
    $_SESSION['nome'] = $dadosAutenticados['fun_nome'];
    $_SESSION['username'] = $dadosAutenticados['fun_email'];
    $_SESSION['password'] = $dadosAutenticados['fun_password'];
    header("Location: ../View/MenuFuncionario.php");
}else{
    header("Location: ../index.php");
}

?>