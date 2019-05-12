<!DOCTYPE html>
<?php
require_once 'Classes/Contato.php';
require_once 'Classes/TipoContato.php';
require_once 'Classes/ContatoDAO.php';
require_once 'Classes/TelefoneDAO.php';
require_once 'Classes/Telefone.php';


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contato</title>
				<link rel="stylesheet" href="css/estilo.css" type="text/css">
    </head>
    <body>
		<?php
			//session_start();

			$quantidadeDeTelefones = $_POST['quantidadeDeTelefones'];
			
			$contato = new Contatos();
			$contato->setNome($_POST['nome']);
			$contato->setEmail($_POST['email']);
			$contato->setApelido($_POST['apelido']);
			$contato->setDtnasc($_POST['dtnasc']);
			$tipo = new TipoContato();
			$tipo->setTipo($_POST['tipo']);
			$contato->setTipo($tipo);
			$contatodao = new ContatoDAO($contato);
		
			if(!$contatodao->insertCompleto($_SESSION['id'])){

			}

			$pegarUltimoID = new TelefoneDAO(new Telefone);
			$ultimoId = $pegarUltimoID->getIdDono();
			
			for($indice = 0; $indice<$quantidadeDeTelefones+1; $indice++){
				
				$telefone = new Telefone();
				$telefone->setTelefone($_POST['telefone'.$indice]);
				$telefoneDAO = new TelefoneDAO($telefone);
									
				if($telefoneDAO->insertAll($ultimoId->id)){
					
				}else{
					header("Location:errousuario.php");
				}	
			}
			header("Location:formcontato.php");
			
		?>
    </body>
</html>