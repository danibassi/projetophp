<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Outra aula de PHP</title>
    </head>
    <body>
        <form action="cadusuario.php" method="POST" name="form1" >
          <h1>Cadastro de Usuários</h1>
          <hr>
          <input type="hidden" name="id" />
          Nome:
          <input type="text" name="nome" />
          <br/>
		  E-mail:
          <input type="text" name="email" />
          <br/>
		  Senha:
          <input type="password" name="senha" />
          <input type="submit" value="Salvar" />
          <input type="reset" value="Novo" />
		  <input type='button' value='Voltar' onclick='history.go(-1)' />
          <hr>
       </form>
    </body>
</html>