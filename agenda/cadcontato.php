<!DOCTYPE html>
<?php
require_once 'Classes/Contato.php';
require_once 'Classes/TipoContato.php';
require_once 'Classes/ContatoDAO.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contato</title>
				<link rel="stylesheet" href="css/estilo.css" type="text/css">
    </head>
    <body>
		<?php
			$contato = new Contatos();
			$contato->setNome($_POST['nome']);
			$contato->setEmail($_POST['email']);
			$contato->setCelular($_POST['celular']);
			$contato->setApelido($_POST['apelido']);
			$contato->setDtnasc($_POST['dtnasc']);
			$tipo = new TipoContato();
			$tipo->setTipo($_POST['tipo']);
			$contato->setTipo($tipo);
			$contatodao = new ContatoDAO($contato);
			if($contatodao->insert()){
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