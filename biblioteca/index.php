<!DOCTYPE html>
<?php
    $_SESSION = array();
    session_destroy();
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="View/_css/stylelogin.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Entrar</title>
    </head>

    <body>

        <div class="caixaLogin">
            <div class="logo"><img src="View/_img/logo-roxo.png" width="60px" height="60px"></div>
            <div class="titulo">LOGIN</div>
            <form action="Control/autenticarUsuario.php" method="post">
            <label class="field a-field a-field_a1 page__field">
                <input class="field__input a-field__input" type="text" size="60" placeholder="Digite seu login" name="username" id="username" required>
                <span class="a-field__label-wrap">
                    <span class="a-field__label">E-mail</span>
                </span>
            </label>
            <br>
            <br>
            <label class="field a-field a-field_a1 page__field">
                <input class="field__input a-field__input" type="password" size="60" placeholder="Digite sua senha" name="password" id="password" required>
                <span class="a-field__label-wrap">
                    <span class="a-field__label">Senha</span>
                </span>
            </label>
                <br>
                <br>
                <input class="botao" type="submit" value="Login">
            </form>
        </div>
    </body>
</html>
