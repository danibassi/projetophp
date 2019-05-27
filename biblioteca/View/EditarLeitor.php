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
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <title>Alterar de leitor</title>
    </head>

    <body>
        <header>
            <nav>
                <ul class="ul">
                    <li class="li"><a href="MenuFuncionario.php">Página inicial</a></li>
                </ul>
            </nav>
        </header>
        
        <div style="float: left; width: 20%">
            <table border=1>
                <td>
                    <li><a href="CadastroAutor.php">Cadastrar autor</a></li>
                    <li><a href="CadastroEditora.php">Cadastrar editora</a></li>
                    <li><a href="CadastroLivro.php">Cadastrar livro</a></li>
                    <li><a href="CadastroLeitor.php">Cadastrar usuário</a></li>
                    <li><a href="CadastroFuncionario.php">Cadastrar funcionário</a></li>
                    <li><a href="RegistrarDevolucao.php">Devolução</a></li>
                    <li><a href="CadastrarEmprestimo.php">Empréstimo</a></li>
                    <li><a href="EditarLivro.php">Editar livro cadastrado</a></li>
                    <li><a href="ListarLeitor.php">Leitores cadastrados</a></li>
                    <li><a href="ListarLivro.php">Livros cadastrados</a></li>
                </td>
            </table>
        </div>  

        
        <div id="divBusca" style="float: left; width: 80%">
            <form action="../Control/altLeitor.php" method="post">
                <label>Nome: </label>
                <input type="text" id="nome" name="nome" value="<?php echo $leitorEncontradoNoBanco['lei_nome'];?>" required><br>

                <label>E-mail: </label>
                <input type="email" id="email" name="email" value="<?php echo $leitorEncontradoNoBanco['lei_email'];?>" required><br>

                <label>Data de nascimento: </label>
                <input type="date" id="dtnasc" name="dtnasc" value="<?php echo $leitorEncontradoNoBanco['lei_dtnasc'];?>" required><br>

                <label>Sexo: </label>
                <?php
                    if($leitorEncontradoNoBanco['lei_sexo'] == "M"){
                        echo "<label><input type='radio' name='sexo' value='F'> Feminino </label>
                              <label><input type='radio' name='sexo' value='M' checked> Masculino</label><br><br>";
                 }else{
                        echo "<label><input type='radio' name='sexo' value='F' checked> Feminino </label>
                              <label><input type='radio' name='sexo' value='M'> Masculino</label><br><br>";
                 }?>

                <label for="cep">Cep: </label>
                <input name="cep" type="text" id="cep" value="<?php echo $leitorEncontradoNoBanco['end_cep'];?>" size="10" maxlength="9"
                       onblur="pesquisacep(this.value);" /><br>

                <label>Endereço: </label><br>
                <label for="rua">Rua:</label>
                <input type="text" name="rua" id="rua" size="36" value="<?php echo $leitorEncontradoNoBanco['end_rua'];?>">

                <label for="numero">Numero:</label>
                <input type="text" id="numero" name="numero" size="4" value="<?php echo $leitorEncontradoNoBanco['end_numero'];?>"><br>

                <label for="bairro">Bairro:</label>
                <input id="bairro" name="bairro" size="20" type="text" value="<?php echo $leitorEncontradoNoBanco['end_bairro'];?>">

                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" size="20" value="<?php echo $leitorEncontradoNoBanco['end_cidade'];?>"><br>

                <label for="estado">Estado:</label>
                <input name="uf" type="text" id="uf" size="2" value="<?php echo $leitorEncontradoNoBanco['end_estado'];?>"><br>

                <label for="ibge">IBGE</label>
                <input name="ibge" type="text" id="ibge" size="8" value="<?php echo $leitorEncontradoNoBanco['end_ibge'];?>"><br>

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
                <input type="text" name="telefone" size="8" maxlength="13" value="<?php echo $leitorEncontradoNoBanco['tel_numero'];?>"required><br>

                <input type="hidden" name="idLeitorAlterar" value="<?php echo $leitorEncontradoNoBanco['lei_id']?>">

                <button type="submit" name="submit">Enviar</button>
                <script src="_js/endereco.js"></script>
            </form>
        </div>
    </body>

</html>