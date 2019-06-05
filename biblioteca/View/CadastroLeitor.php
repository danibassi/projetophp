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
        <link rel="stylesheet" type="text/css" href="_css/styleinicio.css">
        <link href="_css/modal.css" rel="stylesheet" type="text/css">
        <script src="_js/script.js"></script>
        <script type="text/javascript" src="_js/jquery-3.2.1.min.js"></script>
	      <script type="text/javascript" src="_js/janela.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Leitores</title>
    </head>

    <body>
      <div style="height: 250px; width: 600px;"class="window" id="fechar">
          <div style="margin-left: 220px; margin-top: 40px;"class="titulomodal">Corfimação</div><br><br><br>
          <div class="formulario">
              <div style="margin-left:130px; margin-top: 10px;"class="confirma">Tem certeza que deseja sair da biblioteca?</div><br><br>
              <a style="border: none;" href="CadastroLeitor.php" ><button style="float: left; margin-left: 80px;" class="botao">Cancelar</button></a>
              <a style="border: none;" href="../index.php"><button style="margin-left: 300px; margin-top: -30px;" class="botao">Confirmar</button></a>
        </div>
      </div>
        <div id="mascara"></div>
    <div id="caixamenu">
    <div id="logo"><img src="_img/logo-branco.png" width="50px" height="50px"></div>
        <div class="nome">Biblioteca</div>
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="ListarLeitor.php">Leitores</a>
            <a href="ListarLivro.php">Livros</a>
            <a href="ListarEmprestimos.php">Empréstimos</a>
            <a href="CadastroFuncionario.php">Funcionários</a>
            <a href="#fechar" rel="Modal">Sair</a>
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
                <input class="campo" type="date" id="dtnasc" size="35" name="dtnasc" required>

                <div class="group">
                <label style="margin-right: 10px;">Sexo: </label>
                    <input type="radio" name="sexo" value="F" id="rb1" />
                    <label class="sexo" for="rb1">Feminino</label>
                    <input type="radio" name="sexo" value="M" id="rb2" />
                    <label class="sexo" for="rb2">Masculino</label>
                </div><br><br>


                <label for="cep">Cep: </label>
                <input class="campo" name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                       onblur="pesquisacep(this.value);" />
                <label style="margin-left:20px;" for="rua">Rua:</label>
                <input class="campo" type="text" name="rua" id="rua" size="45">

                <label style="margin-left:20px;" for="numero">Número:</label>
                <input class="campo" type="text" id="numero" name="numero" size="4">

                <input class="campo" name="ibge" type="hidden" id="ibge" size="8"><br><br>

                <label for="bairro">Bairro:</label>
                <input class="campo" id="bairro" name="bairro" size="30" type="text">

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
                <input class="campo" type="text" name="telefone" size="20" maxlength="13" required><br>

                <button class="botao" type="submit" name="submit">cadastrar</button>
                <script src="_js/endereco.js"></script>
            </form>
        </div>
    </body>

</html>
