<?php

require_once '../DAO/EstadoDAO.php';
require_once '../Classes/Estado.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: Index.php");
    exit;
}

?>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/styleleitor.css">
        <link rel="stylesheet" type="text/css" href="_css/estilohome.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Leitores</title>
    </head>

    <body>
    <div id="caixamenu"> 
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="CadastroLeitor.php">Leitores</a>
            <a href="CadastroLivro.php">Livros</a>
            <a href="Emprestimo.php">Empréstimos</a>
            <a href="RegistrarDevolucao.php">Devolução</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="CadastroEditora.php">Editoras</a>
            <a href="CadastroAutor.php">Autores</a>             
        </div>
    </div>  

        <div class="titulo"> Cadastro de Leitor </div>        
        <div class="caixaform">

            <form action="../Control/cadLeitor.php" method="post">

                <label>Nome: </label>
                <input class="campo" type="text" id="nome" name="nome" size="50" required>

                <label style="margin-left:20px;">E-mail: </label>
                <input class="campo" type="email" id="email" name="email" size="50" required><br><br>

                <label>Data de nascimento: </label>
                <input class="campo" type="date" id="dtnasc" name="dtnasc" required>

                <label style="margin-left:30px;">Sexo: </label>
                <label><input type="radio" name="sexo" value="F"> Feminino </label>
                <label><input type="radio" name="sexo" value="M"> Masculino</label><br><br>

                <label for="cep">Cep: </label>
                <input class="campo" name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                       onblur="pesquisacep(this.value);" />
                <label style="margin-left:20px;" for="rua">Rua:</label>
                <input class="campo" type="text" name="rua" id="rua" size="36">

                <label style="margin-left:20px;" for="numero">Número:</label>
                <input class="campo" type="text" id="numero" name="numero" size="4">

                <label style="margin-left:20px;" for="ibge">IBGE</label>
                <input class="campo" name="ibge" type="text" id="ibge" size="8"><br><br>

                <label for="bairro">Bairro:</label>
                <input class="campo" id="bairro" name="bairro" size="20" type="text">

                <label style="margin-left:20px;" for="cidade">Cidade:</label>
                <input class="campo" type="text" name="cidade" id="cidade" size="20">

                <label style="margin-left:20px;" for="estado">Estado:</label>
                <input class="campo" name="uf" type="text" id="uf" size="2" ><br><br>              

                <tr>
                    <td>
                        <label>Tipo de telefone:</label>
                        <select class="campo" name="tipo" id="tipo" required> 
                            <option value="null"></option>
                            <option value=1>Residencial</option>
                            <option value=2>Celular</option>  
                            <option value=3>Comercial</option> 
                        </select>
                    </td>
                </tr>
                <label style="margin-left:20px;" for="telefone">Telefone:</label>
                <input class="campo" type="text" name="telefone" size="8" maxlength="13" required><br>

                <button class="botao" type="submit" name="submit">cadastrar</button>
                <script src="_js/endereco.js"></script>
            </form>
        </div>
    </body>

</html>