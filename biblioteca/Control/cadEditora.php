<?php
    require_once '../Classes/Editora.php';
    require_once '../DAO/EditoraDAO.php';

    $editora = new Editora();

    $editora->setNome($_POST['nome']);
    
    $editoraDAO = new EditoraDAO($editora);

    if($editoraDAO->insert()){
        header("Location: ../View/CadastroFinalizado.php?id=EDITORA");
    }else{
        
    }
?>