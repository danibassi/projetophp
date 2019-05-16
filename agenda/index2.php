<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo-login1.css" media="screen">
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dosis:200" rel="stylesheet">
        <title>ENTRAR</title>
    </head>
    <body>
        <div class="form-login">
        <?php $cout ?>
        <form action="autenticar.php" method="POST" name="form1" >
            <h1>agenda de contatos</h1>
            <div class="erro"> Erro ao autenticar </div>
            <input class="campo" type="text" name="email" placeholder="Digite seu email"/>
            <br/>
            <input class="campo" type="password" name="senha" placeholder="Digite sua senha" />
            <br><br>
            <input class="entrar" type="submit" value="ENTRAR" />
            <br>            
        </form>
	      <p>Clique <a href='formcadusuario.php'>aqui </a>para se cadastrar</p>
          
        </div>
    </body>
</html>