<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: ../index.php");
    exit;
}
require_once '../Classes/Leitor.php';
require_once '../DAO/LeitorDAO.php';
$leitorDAO = new LeitorDAO(new Leitor);
$leitorEncontradoNoBanco = $leitorDAO->select($_POST['idAlterar']);

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
              <a style="border: none;" href="EditarLeitor.php" ><button style="float: left; margin-left: 80px;" class="botao">Cancelar</button></a>
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

        <div class="titulo"> Edição de Leitor </div>
        <div class="caixaform">
            <form action="../Control/altLeitor.php" method="post">
                <label>Nome: </label>
                <input class="campo" type="text" id="nome" size="50" name="nome" value="<?php echo $leitorEncontradoNoBanco['lei_nome'];?>" required>

                <label style="margin-left:20px;">E-mail: </label>
                <input class="campo" type="email" id="email" size="50" name="email" value="<?php echo $leitorEncontradoNoBanco['lei_email'];?>" required><br><br>

                <label>Data de nascimento: </label>
                <input class="campo" type="date" id="dtnasc" name="dtnasc" value="<?php echo $leitorEncontradoNoBanco['lei_dtnasc'];?>" required>
                <?php
                    if($leitorEncontradoNoBanco['lei_sexo'] == "M"){
                        echo " <div class='group'>
                        <label style='margin-right: 10px;'>Sexo: </label>
                            <input type='radio' name='sexo' value='F' id='rb1' />
                            <label class='sexo' for='rb1'>Feminino</label>
                            <input type='radio' name='sexo' value='M' id='rb2' />
                            <label class='sexo' for='rb2'>Masculino</label>
                        </div>";
                 }else{
                        echo "<div class='group'>
                        <label style='margin-right: 10px;'>Sexo: </label>
                            <input type='radio' name='sexo' value='F' id='rb1' />
                            <label class='sexo' for='rb1'>Feminino</label>
                            <input type='radio' name='sexo' value='M' id='rb2' />
                            <label class='sexo' for='rb2'>Masculino</label>
                        </div>";
                 }?>
                    <br>
                    <br>
                <label for="cep">Cep: </label>
                <input class="campo "name="cep" type="text" id="cep" value="<?php echo $leitorEncontradoNoBanco['end_cep'];?>" size="10" maxlength="9"
                       onblur="pesquisacep(this.value);" />
                <label style="margin-left:20px;" for="rua">Rua:</label>
                <input class="campo" type="text" name="rua" id="rua" size="45" value="<?php echo $leitorEncontradoNoBanco['end_rua'];?>">

                <label style="margin-left:20px;" for="numero">Número:</label>
                <input class="campo" type="text" id="numero" name="numero" size="4" value="<?php echo $leitorEncontradoNoBanco['end_numero'];?>"><br>

                <input class="campo" name="ibge" type="hidden" id="ibge" size="8" value="<?php echo $leitorEncontradoNoBanco['end_ibge'];?>"><br>

                <label for="bairro">Bairro:</label>
                <input class="campo" id="bairro" name="bairro" size="30" type="text" value="<?php echo $leitorEncontradoNoBanco['end_bairro'];?>">

                <label style="margin-left:20px;" for="cidade">Cidade:</label>
                <input class="campo" type="text" name="cidade" id="cidade" size="20" value="<?php echo $leitorEncontradoNoBanco['end_cidade'];?>">

                <label style="margin-left:20px;"for="estado">Estado:</label>
                <input class="campo" name="uf" type="text" id="uf" size="2" value="<?php echo $leitorEncontradoNoBanco['end_estado'];?>"><br>

                <br>
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
                <label style="margin-left:20px;"for="telefone">Telefone:</label>
                <input class="campo" type="text" name="telefone" size="20" maxlength="13" value="<?php echo $leitorEncontradoNoBanco['tel_numero'];?>"required><br>

                <input type="hidden" name="idLeitorAlterar" value="<?php echo $leitorEncontradoNoBanco['lei_id']?>">

                <button class="botao" type="submit" name="submit">Enviar</button>
                <script src="_js/endereco.js"></script>
            </form>
        </div>
    </body>

</html>
