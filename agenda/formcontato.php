<!DOCTYPE html>
<?php 
    include "Classes/Contato.php";
    include "Classes/TipoContato.php";
    require_once 'Classes/ContatoDAO.php';
    require_once 'Classes/TelefoneDAO.php';
    require_once 'Classes/Telefone.php';
?>
<?php
    if(!isset($_SESSION['login']) || !isset($_SESSION['senha'])){
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header("Location: index.php");
        exit;
    }
?>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Contato</title>
        <link rel="stylesheet" href="css/estilo-contatos.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <script>
            var controlador = true;
            function aparecer(element){
                var div = document.getElementById(element);
                if(controlador){
                    div.style.display = 'block';
                    controlador = false;
                }else{
                    div.style.display = 'none';
                    controlador = true;
                }
            }
            var contadorDeTelefone = 0;
            function adcionarMaisTelefone(){
                var codigo = document.getElementById("telefones")
                codigo.innerHTML += "<input class='telefone' type='text' name='telefone"+contadorDeTelefone+"'><br>";
                pegarContador();
                contadorDeTelefone++;
            }
            function pegarContador(){
                var codigo = document.getElementById("quantidadeDeTelefones")
                codigo.innerHTML = "<input type='hidden' name='quantidadeDeTelefones' value="+contadorDeTelefone+">";
            }
        </script>
    </head>
    <body>
            <div class="caixa-form">
                <h1>Cadastro de Contatos</h1>
                <form action="cadcontato.php" method="POST" name="form1" >                
                    <input class="campo" type="text" name="nome" placeholder="Digite o nome"/>
                    <br>
                    <input class="campo" type="text" name="apelido" placeholder="Digite o apelido"/>
                    <br>
                    <input class="campo" type="text" name="email" placeholder="Digite o email" />
                    <br>
                    
                    <br>
                    <label class="data">Data de Nascimento: </label><input class="campo" type="date" name="dtnasc"/>
                    <br>
                    <?php
                        $tipoContato = new TipoContato();
                    ?>
                    <label class="tipo">Tipo de Telefone: </label><select class="selecao" name="tipo">
                        <option> </option>
                        <?php
                            foreach($tipoContato->findAll() as $key => $value):
                                echo "<option value=$value->id>$value->tipo</option>";
                            endforeach;
                        ?>
                    </select>
                    <div id="quantidadeDeTelefones">
                        <input type='hidden' name='quantidadeDeTelefones' value="0">
                    </div>
                    
                    <label>Telefone:</label>
                    <input type="button" nome="addMaisTelefone" value="Adicionar" onclick="adcionarMaisTelefone()">
                    <div id="telefones"></div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <input class="botao" type="submit" value="Cadastrar" />
                    <input class="botao"type="reset" value="Limpar" />
                </form>
                <form action="gerarRelatorioPDF.php">
                    <input class="botao" type="submit" value="Relátorio">
                </form>
                <form action="index.php">
                    <input class="botao" type="submit" value="Sair">
                </form>
            </div>
            
        <?php
            $contato = new Contatos();
            $meu_contato = new ContatoDAO($contato);
            $meu_telefone = new TelefoneDAO(new Telefone());
        ?>
        
        <?php foreach($meu_contato->findAllCompleto($_SESSION['id']) as $key => $value):?>
        <div class="caixacontato">
            <?php
            echo $value->nome;
            ?>
            
            <input type="button" value="Mostrar" onclick="aparecer('<?php echo $value->id;?>')">
            <div class="contatos" id="<?php echo $value->id;?>">
            <?php echo $value->apelido;?><br>
            <?php echo $value->email;?><br>
            <?php
                foreach($meu_telefone->findAllTelefone($value->id) as $key => $telefoneDoBanco):?>
                    <form action="excluirTelefone.php" method="POST">
                        <?php echo $telefoneDoBanco->numero;?>
                        <input type="hidden" name="id" value=<?php echo $telefoneDoBanco->cont_id;?>>
                        <input class="excluitel" type="submit" value="Excluir Telefone">
                        
                    </form>
            <?php  endforeach; ?>
            <?php echo $value->dtnasc;?><br>
            <?php echo $value->tipo;?><br><br>
            <?php echo "<a class='dentro' href='formeditcontato.php?id=".$value->id."'>Editar</a>";?>
            <?php echo "<a class='dentro' href='excluircontato.php?id=".$value->id."'>Apagar</a>";?><br>
            </div>
            <br>  
            </div>          
        <?php endforeach; ?>



    </body>
</html>