<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo-login.css" media="screen">
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dosis:200" rel="stylesheet">
        <title>Cadastro de Usuário</title>
    </head>
    <body>
    <div class="form-cadastro">
        <form action="cadusuario.php" method="POST" name="form1" >
            <h1>Cadastro de Usuários</h1>
            <input type="hidden" name="id" />
            <input class="campo" type="text" name="nome" placeholder="Digite seu nome"/>
            <br/>
            <input class="campo" type="text" name="email" placeholder="Digite seu e-mail" />
            <br/>
            <input class="campo" type="password" name="senha" placeholder="Digite sua senha" />
            <br>
            <br>
            <input class="salvar" type="submit" value="SALVAR"/>
            <input class="limpar" type="reset" value="LIMPAR"/>
            <input class="voltar" type='button' value='Voltar' onclick='history.go(-1)'/>
       </form>
    </div>
    </body>
</html>