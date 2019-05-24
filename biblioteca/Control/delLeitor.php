<?php

    require_once '../Classes/Leitor.php';
    require_once '../DAO/LeitorDAO.php';

    if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        header("Location: Index.php");
        exit;
    }

    $idRecebido = $_POST['idDeletar'];

    $leitor = new LeitorDAO(new Leitor);

    if($leitor->deleteLeitorComEnderecoETelefone($idRecebido)){
        header("Location:../View/ListarLeitor.php");
    }

?>