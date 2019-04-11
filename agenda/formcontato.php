<!DOCTYPE html>
<?php 
    include "Classes/Contato.php";
    include "Classes/TipoContato.php"
?>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Contato</title>
        <link rel="stylesheet" href="css/estilo.css" type="text/css">
    </head>
    <body>
      	<form action="cadcontato.php" method="POST" name="form1" >
          	<h1>Contatos</h1>
          	<hr>
          	Nome:
          	<input type="text" name="nome" />
          	<br/>
          	Celular:
          	<input type="text" name="celular" />
          	<br>
          	Apelido:
            <input type="text" name="apelido" />
          	<br>
            Email:
            <input type="text" name="email" />
          	<br>
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
            <br>
            <input type="submit" value="Criar novo" />
            <input type="reset" value="Limpar" />
            <hr>
        </form>
        <?php
            $meu_contato = new Contatos();
        ?>
        <table id="stusuarios">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Apelido</td>
                    <td>E-mail</td>
                    <td>Celular</td>
                    <td>Data de Nascimento</td>
                    <td>Tipo</td>
                    <td>Ação</td>
                    <td>Deletar</td>
                </tr>
            </thead>
            <?php foreach($meu_contato->findAllCompleto() as $key => $value):?>
              <tbody>
                  <tr>
                      <td><?php echo $value->nome;?></td>
                      <td><?php echo $value->apelido;?></td>
                      <td><?php echo $value->email;?></td>
                      <td><?php echo $value->celular;?></td>
                      <td><?php echo $value->dtnasc;?></td>
                      <td><?php echo $value->tipo;?></td>
                      <td><?php echo "<a href='formeditcontato.php?id=".$value->id."'>Editar</a>";?>
                      <td><?php echo "<a href='excluircontato.php?id=".$value->id."'>Deletar</a>";?>
                      </td>
                  </tr>
              </tbody>
            <?php endforeach; ?>
          </table>
    </body>
</html>