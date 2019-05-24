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

$emailEPasswordAltenticados = $dao->getEmailAndPassword();

if($funcionario->getPassword() == $emailEPasswordAltenticados['fun_password']){
    $_SESSION['id'] = $emailEPasswordAltenticados['fun_id'];
    $_SESSION['username'] = $emailEPasswordAltenticados['fun_email'];
    $_SESSION['password'] = $emailEPasswordAltenticados['fun_password'];
    header("Location: ../View/MenuFuncionario.php");
}else{
    header("Location: ../View/Index.php");
}

?>