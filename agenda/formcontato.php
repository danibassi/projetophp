<!DOCTYPE html>
<?php 
    include "Classes/Contato.php";
    include "Classes/TipoContato.php";
    require_once 'Classes/ContatoDAO.php';
    require_once 'Classes/TelefoneDAO.php';
    require_once 'Classes/Telefone.php';
?>
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Contato</title>
        <link rel="stylesheet" href="css/estilo.css" type="text/css">
    </head>
    <body>
    <?php
        if(!isset($_SESSION['login']) || !isset($_SESSION['senha'])){
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            
            header("Location: index.php");
            exit;
        }
        ?>
      	<form action="cadcontato.php" method="POST" name="form1" >
          	<h1>Contatos</h1>
          	<hr>
          	Nome:
          	<input type="text" name="nome" />
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
            $contato = new Contatos();
            $meu_contato = new ContatoDAO($contato);
            $meu_telefone = new TelefoneDAO(new Telefone());
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
                    <td>Add Telefone</td>
                </tr>
            </thead>
            <?php foreach($meu_contato->findAllCompleto($_SESSION['id']) as $key => $value):?>
              <tbody>
                  <tr>
                      <td><?php echo $value->nome;?></td>
                      <td><?php echo $value->apelido;?></td>
                      <td><?php echo $value->email;?></td>
                      <td>
                        <?php 
                            foreach($meu_telefone->findAllTelefone($value->id) as $key => $telefone):
                                echo $telefone->numero. "<br>";
                            endforeach;
                        ?>
                      </td>
                      <td><?php echo $value->dtnasc;?></td>
                      <td><?php echo $value->tipo;?></td>
                      <td><?php echo "<a href='formeditcontato.php?id=".$value->id."'>Editar</a>";?>
                      <td><?php echo "<a href='excluircontato.php?id=".$value->id."'>Deletar</a>";?>
                      <td>
                        <form action="formtelefone.php" method="POST">
                            <input type="hidden" name="id" value = <?php echo $value->id;?>>
                            <input type="submit" value = "Adicionar">
                        </form>
                      </td>
                  </tr>
              </tbody>
            <?php endforeach; ?>
          </table>
          <form action="index.php">
                    <input type="submit" value="Sair">
          </form> 
    </body>
</html>