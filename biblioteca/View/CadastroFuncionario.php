<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}
?>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/styleforms.css">
        <link rel="stylesheet" type="text/css" href="_css/Home.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Funcionários</title>
    </head>

    <body>
    <div id="caixamenu">
        <div id="logo"><img src="_img/logobranco.png" width="50px" height="50px"></div>
        <div class="nome">Biblioteca</div>
        <!-- <h3></h3> -->
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="ListarLeitor.php">Leitores</a>
            <a href="ListarLivro.php">Livros</a>
            <a href="ListarEmprestimos.php">Empréstimos</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="../index.php">Sair</a>
        </div>
    </div>

    <div class="titulo"> FUNCIONÁRIO </div>
        <div class="caixaform">
            <form action="../Control/cadFuncionario.php" method="post">

                <label style="float: left; margin-top: 5px; margin-right: 5px;">Nome: </label>
                <input style="float: left; margin-right: 25px;"class="campo" id="formatacaoForm" type="text" id="nome" name="nome" size="40" required>

                <div class="group">
                <label style="margin-right: 10px;">Sexo: </label>
                    <input type="radio" name="sexo" value="F" id="rb1" />
                    <label class="sexo" for="rb1">Feminino</label>
                    <input type="radio" name="sexo" value="M" id="rb2" />
                    <label class="sexo" for="rb2">Masculino</label>
                </div><br><br>

                <!-- <label><input type="radio" name="sexo" value="F"> Feminino </label>
                <label><input type="radio" name="sexo" value="M"> Masculino</label><br><br>      -->

                <label>E-mail: </label>
                <input class="campo" id="formatacaoForm" type="text" id="email" name="email" size="40" required>

              <label style="margin-left: 20px;">Confirmar E-mail: </label>
                <input class="campo" id="formatacaoForm" type="text" name="confirmEmail" size="40" required><br><br>

                <label>Senha:</label>
                <input class="campo" id="formatacaoForm" type="password" name="password" size="40" required>


                <label style="margin-left: 20px;">Confirmar Senha:</label>
                <input class="campo" id="formatacaoForm" type="password" name="confirmPassword" size="40" required><br><br><br><br><br>

                <button class="botao" type="submit" name="submit">Enviar</button>

            </form>
        </div>
    </body>
</html>
