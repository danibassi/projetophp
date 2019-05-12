<?php

    require_once '../Classes/Leitor.php';
    require_once '../DAO/LeitorDAO.php';

    $idRecebido = $_POST['id'];

    $leitor = new LeitorDAO(new Leitor);

    if($leitor->deleteLeitorComEnderecoETelefone($idRecebido)){
        header("Location:../View/ListarLeitor.php");
    }

?>