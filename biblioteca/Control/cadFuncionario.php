<?php
    require_once '../Classes/Funcionario.php';
    require_once '../DAO/FuncionarioDAO.php';

    $funcionario = new Funcionario();
    $funcionario->setNome($_POST['nome']);
    $funcionario->setEmail($_POST['email']);
    $funcionario->setPassword($_POST['password']);
    $funcionario->setSexo($_POST['sexo']);

    $funcionarioDAO = new FuncionarioDAO($funcionario);

    if($funcionarioDAO->insert()){
        header("Location:../View/CadastroFinalizado.php?id=Funcionario");
    }else{

    }
?>