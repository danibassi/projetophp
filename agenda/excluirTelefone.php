<?php 
	require_once 'Classes/TelefoneDAO.php';
    require_once 'Classes/Telefone.php';

	$id = $_POST['id'];

	echo $id;
	
	$telefoneDAO = new TelefoneDAO(new Telefone);

	if($telefoneDAO->delete($id)){
		header("location:formcontato.php");
	}else{
		echo "Erro";
	}
	
?>