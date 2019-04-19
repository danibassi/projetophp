<?php 
	
	require_once'Classes/UsuarioDAO.php';
	require_once'Classes/Usuarios.php';

	$email=$_POST['email'];
	$senha=$_POST['senha'];

	$pegar_id;
	$autenticar_email=0;
	$autenticar_senha;

	$autenticar = new UsuarioDAO(new Usuarios());

	if(session_status() !== PHP_SESSION_ACTIVE){
		session_cache_expire(60);
		session_start();
	}

	foreach($autenticar->findAll() as $key => $value):
		if($email == $value->email){
			$pegar_id = $value->id;
			$autenticar_email=$value->email;
			$autenticar_senha=$value->senha;
		}else{
			header("Location: index2.php");
		}
	endforeach;
	if($autenticar_email){
		if($autenticar_senha==$senha){
			$_SESSION['id'] = $pegar_id;
			$_SESSION['login'] = $email;
			$_SESSION['senha'] = $senha;
			header("Location: formcontato.php");
		}else{
			header("Location: index2.php");
		}
	}

?>
