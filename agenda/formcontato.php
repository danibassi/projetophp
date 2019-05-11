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
        <link rel="stylesheet" href="css/estilo.css" type="text/css">
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
        </script>
    </head>
    <body>
        <header>    
            <h1>Contatos</h1>
        </header>
        <section>
            <form action="cadcontato.php" method="POST" name="form1" >
                Nome:
                <input type="text" name="nome" />
                <br>
                Apelido:
                <input type="text" name="apelido" />
                <br>
                Email:
                <input type="text" name="email" />
                <br>
                Telefone:
                <input type="button" nome="addMaisTelefone" value="+" onclick="adcionarMaisTelefone()">
                <br>
                <div id="telefones"></div>
                <script>
                    var contadorDeTelefone = 0;
                    function adcionarMaisTelefone(){
                        var codigo = document.getElementById("telefones")
                        codigo.innerHTML += "<input type='text' name='telefone"+contadorDeTelefone+"'><br>";
                        pegarContador();
                        contadorDeTelefone++;
                    }
                    function pegarContador(){
                        var codigo = document.getElementById("numeroDeTelefones")
                        codigo.innerHTML = "<input type='hidden' name='numeroDeTelefones' value="+contadorDeTelefone+">";
                    }
                </script>
                Data de Nascimento:
                <input type="date" name="dtnasc" />
                <br>
                Tipo de Contato:
                <?php
                    $tipoContato = new TipoContato();
                ?>
                <select name="tipo">
                    <?php
                        foreach($tipoContato->findAll() as $key => $value):
                            echo "<option value=$value->id>$value->tipo</option>";
                        endforeach;
                    ?>
                </select>
                <div id="numeroDeTelefones">
                    <input type='hidden' name='numeroDeTelefones' value="0">
                </div>
                <br>
                <input type="submit" value="Criar novo" />
                <input type="reset" value="Limpar" />
            </section>
        </form>
        <?php
            $contato = new Contatos();
            $meu_contato = new ContatoDAO($contato);
            $meu_telefone = new TelefoneDAO(new Telefone());
        ?>
            <?php foreach($meu_contato->findAllCompleto($_SESSION['id']) as $key => $value):?>    
                <?php 
                echo $value->nome;
                ?>
                <input type="button" value="Mostrar" onclick="aparecer('<?php echo $value->id;?>')">
                <div class="contatos" id="<?php echo $value->id;?>">
                <?php echo $value->apelido;?><br>
                <?php echo $value->email;?><br>
                <?php 
                    foreach($meu_telefone->findAllTelefone($value->id) as $key => $telefone):?>
                        <form action="excluirTelefone.php" method="POST">
                            <?echo $telefone->numero;?>
                            <input type="hidden" name="id" value=<?php echo $telefone->cont_id;?>>
                            <input type="submit" value="Excluir Telefone">
                            <br>
                        </form>
                <?  endforeach; ?>
                <?php echo $value->dtnasc;?><br>
                <?php echo $value->tipo;?><br>
                <?php echo "<a href='formeditcontato.php?id=".$value->id."'>Editar</a>";?><br>
                <?php echo "<a href='excluircontato.php?id=".$value->id."'>Apagar</a>";?><br>                        
                </div>
                <br>
            <?php endforeach; ?>
          <form action="index.php">
                    <input type="submit" value="Sair">
          </form> 
    </body>
</html>