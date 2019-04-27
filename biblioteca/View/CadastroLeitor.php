<?php
    require_once '../DAO/EstadoDAO.php';
    require_once '../Classes/Estado.php';
    /*require_once '../DAO/CidadeDAO.php';
    require_once '../Classes/Cidade.php';*/
?>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="_css/estilo.css">
    <title>Cadastro de Leitor</title>
</head>

<body>
    <header>
        <nav>
            <ul class="ul">
                <li class="li"><a href="MenuFuncionario.php">Página inicial</a></li>
            </ul>
        </nav>
    </header>

    <div>
        <form action="../Control/cadLeitor.php" method="post">

            <label>Nome: </label>
            <input type="text" id="nome" name="nome" required><br>

            <label>E-mail: </label>
            <input type="email" id="email" name="email" required><br>

            <label>Data de nascimento: </label>
            <input type="date" id="dtnasc" name="dtnasc" required><br>

            <label>Sexo: </label>
            <label><input type="radio" name="sexo" value="F"> Feminino </label>
            <label><input type="radio" name="sexo" value="M"> Masculino</label><br><br>

            <label>Endereço: </label><br>
            <label for="rua">Rua:</label>
            <input type="text" name="rua">

            <label for="numero">Numero:</label>
            <input type="text" id="numero" name="numero" size="4"><br>

            <label for="bairro">Bairro: </label>
            <input type="text" name="bairro">

            <label for="cidade">Cidade: </label>
            <input type="text" name="cidade"><br>

            <?php
                $estadoDAO = new EstadoDAO(new Estado());
            ?>
            <tr>
                <td>
                    <label for="estado">Estado:</label>
                    <select name="estado">
                        <option value = "null"></option>
                        <?php
                            foreach($estadoDAO->findAll() as $key => $value):
                                echo "<option value=$value->est_id>$value->est_sigla</option>";
                            endforeach;
                        ?>
                    </select>
                </td>
            </tr>

            <label>CEP: </label>
            <input type="text" name="cep" size="5" maxlength="5"> - <input type="text" name="cep2" size="3" maxlength="3"><br><br>

            <tr>
                <td>
                    <label>Tipo de telefone:</label>
                    <select name="tipo" id="tipo" required> 
                        <option value="null"></option>
                        <option value=1>Residencial</option>
                        <option value=2>Celular</option>  
                        <option value=3>Comercial</option> 
                    </select>
                </td>
            </tr>
            <label for="telefone">Número:</label>
            <input type="text" name="telefone" size="8" maxlength="13" required><br>

            <button type="submit" name="submit">Enviar</button>

        </form>
    </div>
</body>

</html>