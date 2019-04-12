<!DOCTYPE html>
<?php
require_once 'Classes/Usuarios.php';
require_once 'Classes/UsuarioDAO.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Outra aula de PHP</title>
    </head>
    <body>
		<?php
			$usu = new Usuarios();
			$usu->setNome($_POST['nome']);
			$usu->setEmail($_POST['email']);
			$usu->setSenha($_POST['senha']);
			$usuDAO = new UsuarioDAO($usu);

			if($usuDAO->insert()){
				header("Location:formcontato.php");
			}else{
				header("Location:errousuario.php");
			}
		?>
    </body>
</html>
