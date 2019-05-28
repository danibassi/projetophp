<?php
    require_once '../Classes/Funcionario.php';
    require_once '../DAO/FuncionarioDAO.php';

    if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        header("Location: ../View/Index.php");
        exit;
    }

    if($_POST['password'] == $_POST['confirmPassword']){

        $funcionario = new Funcionario();
        $funcionario->setNome($_POST['nome']);
        $funcionario->setEmail($_POST['email']);
        $funcionario->setPassword($_POST['password']);
        $funcionario->setSexo($_POST['sexo']);

        $funcionarioDAO = new FuncionarioDAO($funcionario);

        if($funcionarioDAO->insert()){
            header("Location:../View/MenuFuncionario.php");
        }else{
            header("Location: Location:../View/CadastroFuncionario.php");
        }
    }else{
        header("Location: Location:../View/CadastroFuncionario.php");
    }

?>