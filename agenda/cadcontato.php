<!DOCTYPE html>
<?php
include 'Classes/Contato.php';
Include 'Classes/TipoContato.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contato</title>
				<link rel="stylesheet" href="css/estilo.css" type="text/css">
    </head>
    <body>
		<?php
			$usu = new Contatos();
			$usu->setNome($_POST['nome']);
			$usu->setEmail($_POST['email']);
			$usu->setCelular($_POST['celular']);
			$usu->setApelido($_POST['apelido']);
			$usu->setDtnasc($_POST['dtnasc']);
			$tipo = new TipoContato();
			$tipo->setTipo($_POST['tipo']);
			$usu->setTipo($tipo);
			if($usu->insert()){
				header("Location:formcontato.php");
			}elseif ($usu->update()) {
				header("Location: formcontato.php");
			}

			else{
				header("Location:errocontato.php");
			}
		?>
    </body>
</html>