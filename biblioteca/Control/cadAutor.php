<?php

require_once '../Classes/Autor.php';
require_once '../DAO/AutorDAO.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}

$autor = new Autor();

$autor->setNome($_POST['nome']);
$autor->setDtnasc($_POST['dtnasc']);
$autor->setSexo($_POST['sexo']);

$autorDAO = new AutorDAO($autor);

if($autorDAO->insert()){
    header("Location:../View/CadastroLivro.php");
}else{

}
?>