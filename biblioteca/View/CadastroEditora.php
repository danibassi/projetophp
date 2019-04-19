<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="_css/estilo.css">
    <title>Cadastrar Editora</title>
</head>

<body>
    <header>
        <nav>
            <ul class="ul">
                <li class="li"><a href="MenuFuncionario.html">Menu do Funcionario</a></li>
                <li class="li"><a href="Login.html">Login</a></li>
                <li class="li"><a href="Index.html">Home</a></li>
            </ul>
        </nav>
    </header>
    <div>
        <form action="../Control/cadEditora.php" method="post">
            <label>Nome: </label>
            <input type="text" id="nome" name="nome" required><br>
            <button type="submit" name="submit">Enviar</button>
        </form>
    </div>
</body>

</html>