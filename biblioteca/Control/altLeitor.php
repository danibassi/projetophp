<?php
    require_once '../Classes/Endereco.php';
    require_once '../Classes/Leitor.php';
    require_once '../Classes/Telefone.php';
    require_once '../Classes/TipoTelefone.php';
    require_once '../DAO/LeitorDAO.php';

    $leitor = new Leitor();

    $leitor->setNome($_POST['nome']);
    $leitor->setDtnasc($_POST['dtnasc']);
    $leitor->setSexo($_POST['sexo']);
    $leitor->setEmail($_POST['email']);

    $telefone = new Telefone();

    $telefone->setNumero($_POST['telefone']);
    
    $tipoTelefone = new TipoTelefone();

    $tipoTelefone->setTipo($_POST['tipo']);

    $telefone->setTipoTelefone($tipoTelefone);

    $endereco = new Endereco();

    $endereco->setRua($_POST['rua']);
    $endereco->setNumero($_POST['numero']);
    $endereco->setBairro($_POST['bairro']);
    $endereco->setCidade($_POST['cidade']);
    $endereco->setEstado($_POST['uf']);
    $endereco->setCep($_POST['cep']);

    $leitor->setTelefone($telefone);
    $leitor->setEndereco($endereco);
    
    $leitorDAO = new LeitorDAO($leitor);

    
    if($leitorDAO->update($_POST['idLeitorAlterar'])){
        header("Location:../View/ListarLeitor.php");
    }else{
        
    }
    
?>