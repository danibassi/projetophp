<!DOCTYPE html>
<?php
include 'Classes/Contato.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contato</title>
    </head>
    <body>
		<?php
			$id = $_POST['id'];
			$contato = new Contatos();
			$contato->setNome($_POST['nome']);
			$contato->setEmail($_POST['email']);
			$contato->setCelular($_POST['celular']);
			$contato->setApelido($_POST['apelido']);
			$contato->setDtnasc($_POST['dtnasc']);
			
			if($contato->update($id)){
				header("Location:formcontato.php");
			}else{
				header("Location:errocontato.php");
			}

		?>
    </body>
</html>
