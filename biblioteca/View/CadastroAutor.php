<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="_css/estilo.css">
    <title>Pagina Inicial</title>
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
        <form action="../Control/cadAutor.php" method="post">

            <label>Nome: </label>
            <input type="text" id="nome" name="nome" required><br>

            <label>Data de nascimento: </label>
            <input type="date" id="dtnasc" name="dtnasc" required><br>

            <label>Sexo: </label>
            <label><input type="radio" name="sexo" value="F"> Feminino </label>
            <label><input type="radio" name="sexo" value="M"> Masculino</label><br><br>

            <button type="submit" name="submit">Enviar</button>
        </form>
    </div>
</body>

</html>