<!DOCTYPE html>
<?php 
    include"Classes/Contato.php";
    require_once 'Classes/TipoContato.php';
    require_once 'Classes/ContatoDAO.php';
?>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Editar Contato</title>
        <link rel="stylesheet" href="css/estilo-contatos.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <script>
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
        <?php 
            $id = $_GET['id'];
            $contato_edit = new Contatos();
            $contatodao = new ContatoDAO($contato_edit);
            $contato_edit = $contatodao->select($id);
        ?>
        <div class="caixa-form1">
      	<form action="updatecontato.php" method="POST" name="form1" >
          	<h1>Editar Contato</h1>
          	
        
          	<input class="campo" type="text" name="nome" value=<?php echo $contato_edit->getNome();?> placeholder="Digite o nome"/>
          	<br/>
            
            <input class="campo" type="text" name="apelido" value=<?php echo $contato_edit->getApelido();?> >
          	<br>
            <input class="campo" type="text" name="email" value=<?php echo $contato_edit->getEmail();?> >
          	<br>
            <input type="hidden" name="id" value=<?php echo $id ?>>
          	<label class="data">Data de Nascimento:</label>
            <input class="campo" type="date" name="dtnasc" value=<?php $contato_edit->getDtnasc();?>><br>
            <label class="tipo">Tipo de Contato:</label>
            <?php
                $tipoContato = new TipoContato();
            ?>
            <select class="selecao" name="tipo">
                <?php
                    foreach($tipoContato->findAll() as $key => $value):
                        echo "<option value=$value->id>$value->tipo</option>";
                    endforeach;
                ?>
            </select>
            <br>
            <div id="quantidadeDeTelefones">
               <input type='hidden' name='quantidadeDeTelefones' value="0">
            </div>
            <br>
            <label>Telefone:</label>
                <input type="button" nome="addMaisTelefone" value="Adicionar" onclick="adcionarMaisTelefone()">
            <div id="telefones"></div>
            <br>
            <br>
            <br>

            <input class="botao" type="submit" name="Editar">
            <!--<?php echo "<a href='updatecontato.php?id=".$id."'>Editar</a>";?>-->
            <input class="botao" type="reset" value="Limpar" />
            
        </form>
                </div>
                </div>
    </body>
</html>