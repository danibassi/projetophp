<?php 
	include'Contato.php';

	$id = $_GET['id'];

	$contato= new Contatos();

	if($contato->delete($id)){
		header("location:formcontato.php");
	}else{
		echo "Erro";
	}
?>