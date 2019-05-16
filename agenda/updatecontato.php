<!DOCTYPE html>
<?php
include 'Classes/Contato.php';
require_once 'Classes/TipoContato.php';
require_once 'Classes/ContatoDAO.php';
require_once 'Classes/TelefoneDAO.php';
require_once 'Classes/Telefone.php';
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
			$tipo = new TipoContato();
			$tipo->setTipo($_POST['tipo']);
			$contato->setTipo($tipo);
			$contatodao = new ContatoDAO($contato);
			
			if($contatodao->update($id)){
			}else{
				header("Location:errocontato.php");
			}

			$pegarUltimoID = new TelefoneDAO(new Telefone);
			$ultimoId = $pegarUltimoID->getIdDono();
			
			$quantidadeDeTelefones = $_POST['quantidadeDeTelefones'];
			
			for($indice = 0; $indice<$quantidadeDeTelefones+1; $indice++){
				
				$telefone = new Telefone();
				$telefone->setTelefone($_POST['telefone'.$indice]);
				$telefoneDAO = new TelefoneDAO($telefone);
									
				if($telefoneDAO->insertAll($id)){
					
				}else{
					header("Location:errousuario.php");
				}	
			}
			header("Location:formcontato.php");
			

		?>
    </body>
</html>
