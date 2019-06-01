<?php

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}

require_once '../Classes/Editora.php';
require_once '../DAO/EditoraDAO.php';


$editora = new Editora();

$editora->setEditoraNome($_POST['nome']);

$editoraDAO = new EditoraDAO($editora);

if($editoraDAO->insert()){
    header("Location:../View/MenuFuncionario.php");
}else{

}
?>