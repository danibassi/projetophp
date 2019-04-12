<?php 
	require_once 'Classes/Contato.php';
	require_once 'Classes/ContatoDAO.php';

	$id = $_GET['id'];

	$contato= new Contatos();
	$contatodao = new ContatoDAO($contato);

	if($contatodao->delete($id)){
		header("location:formcontato.php");
	}else{
		echo "Erro";
	}
?>