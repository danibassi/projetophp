<?php
    $_SESSION = array();
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Outra aula de PHP</title>
    </head>
    <body>
        <?php $cout ?>
        <form action="autenticar.php" method="POST" name="form1" >
            <h1>Faça seu login</h1>
            <hr>
            Login:
            <input type="text" name="email"/>
            <br/>
      		Senha:
            <input type="password" name="senha" />
            <input type="submit" value="Login" />
            <input type="reset" value="Limpar" />
            <hr>
        </form>
	      <p>Clique <a href='formcadusuario.php'>aqui </a>para se cadastrar</p>

    </body>
</html>