<!DOCTYPE html>
<?php
include 'Classes/Usuarios.php'
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

			if($usu->insert()){
				header("Location:formcontato.php");
			}else{
				header("Location:errousuario.php");
			}
		?>
    </body>
</html>
