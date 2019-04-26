<!DOCTYPE html>
<?php
require_once 'Classes/Telefone.php';
require_once 'Classes/TelefoneDAO.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Outra aula de PHP</title>
    </head>
    <body>
		<?php
			$telefone = new Telefone();
			$telefone->setTelefone($_POST['numero']);
			$telefone->setDono($_POST['dono']);
			$telefoneDAO = new TelefoneDAO($telefone);
            
            
			if($telefoneDAO->insert()){
				header("Location:formcontato.php");
			}else{
				header("Location:errousuario.php");
            }
            
		?>
    </body>
</html>
