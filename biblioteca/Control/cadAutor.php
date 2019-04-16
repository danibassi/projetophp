<?php
    require_once '../Classes/Autor.php';
    require_once '../DAO/AutorDAO.php';

    $autor = new Autor();

    $autor->setNome($_POST['nome']);
    $autor->setDtnasc($_POST['dtnasc']);
    $autor->setSexo($_POST['sexo']);
    
    $autorDAO = new AutorDAO($autor);

    if($autorDAO->insert()){
        header("Location:../View/viewcadautor.php");
    }else{
        
    }
?>