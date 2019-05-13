<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Outra aula de PHP</title>
    </head>
    <body>
        <form action="cadtelefone.php" method="POST" name="form1" >
          <h1>Cadastro de Usuários</h1>
          <hr>
          <input type="hidden" name="dono" value = <?php echo $_POST['id'];?>>
          Numero:
          <input type="text" name="numero"/>
          <br/>
          <br/>
          <input type="submit" value="Salvar">
          <input type="reset" value="Novo">
		  <input type='button' value='Voltar' onclick='history.go(-1)'>
          <hr>
       </form>
    </body>
</html>