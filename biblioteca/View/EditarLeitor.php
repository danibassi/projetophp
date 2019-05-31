<?php

require_once '../Classes/Leitor.php';
require_once '../DAO/LeitorDAO.php';


if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    header("Location: Index.php");
    exit;
}

$leitorDAO = new LeitorDAO(new Leitor);
$leitorEncontradoNoBanco = $leitorDAO->select($_POST['idAlterar']);

?>
<html lang="pt-br">

    <head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/stylecadastro.css">
        <link rel="stylesheet" type="text/css" href="_css/Home.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito:300&display=swap" rel="stylesheet">
        <title>Leitores</title>
    </head>

    <body>
    <div id="caixamenu"> 
    <div id="logo"><img src="_img/logobranco.png" width="50px" height="50px"></div>
        <div class="nome">Biblioteca</div>
        <div id="menu">
            <a href="MenuFuncionario.php">Ínicio</a>
            <a href="ListarLeitor.php">Leitores</a>
            <a href="ListarLivro.php">Livros</a>
            <a href="ListarEmprestimos.php">Empréstimos</a>
            <a href="CadastroFuncionario.php">Funcionários</a> 
            <a href="Index.php">Sair</a>        
        </div>
    </div>  

        <div class="titulo"> Cadastro de Leitor </div>        
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