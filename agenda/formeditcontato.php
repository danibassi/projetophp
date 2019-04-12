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
        <link rel="stylesheet" href="css/estilo.css" type="text/css">
    </head>
    <body>
        <?php 
            $id = $_GET['id'];
            $contato_edit = new Contatos();
            $contatodao = new ContatoDAO($contato_edit);
            $contato_edit = $contatodao->select($id);
        ?>

      	<form action="updatecontato.php" method="POST" name="form1" >
          	<h1>Editar Contato</h1>
          	<hr>
          	Nome:
          	<input type="text" name="nome" value=<?php echo $contato_edit->getNome();?> >
          	<br/>
          	Celular:
          	<input type="text" name="celular" value=<?php echo $contato_edit->getCelular();?> >
          	<br>
          	Apelido:
            <input type="text" name="apelido" value=<?php echo $contato_edit->getApelido();?> >
          	<br>
            Email:
            <input type="text" name="email" value=<?php echo $contato_edit->getEmail();?> >
          	<br>
            <input type="hidden" name="id" value=<?php echo $id ?>>
          	Data de Nascimento:
            <input type="date" name="dtnasc" value=<?php $contato_edit->getDtnasc();?>>
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
            <input type="submit" name="Editar">
            <!--<?php echo "<a href='updatecontato.php?id=".$id."'>Editar</a>";?>-->
            <input type="reset" value="Limpar" />
            <hr>
        </form>
    </body>
</html>