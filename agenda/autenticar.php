<?php 
	
	require_once'Classes/UsuarioDAO.php';
	require_once'Classes/Usuarios.php';

	$email=$_POST['email'];
	$senha=$_POST['senha'];

	$autenticar_email=0;
	$autenticar_senha;

	$autenticar = new UsuarioDAO(new Usuarios());

	foreach($autenticar->findAll() as $key => $value):
		if($email == $value->email){
			$autenticar_email=$value->email;
			$autenticar_senha=$value->senha;
		}else{
			header("Location: index2.php");
		}
	endforeach;
	if($autenticar_email){
		if($autenticar_senha==$senha){
			header("Location: formcontato.php");
		}else{
			header("Location: index2.php");
		}
	}

?>
