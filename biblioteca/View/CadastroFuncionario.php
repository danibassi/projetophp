<html lang="pt-br">    
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <title>Pagina Inicial</title>        
    </head>
    
    <body> 
    <header>
        <nav><ul class="ul">                
            <li class="li"><a href="MenuFuncionario.html">Menu do Funcionario</a></li>
            <li class="li"><a href="Login.html">Login</a></li>
            <li class="li"><a href="Index.html">Home</a></li>
        </ul></nav>
    </header> 
        
    <div>
        <form action="#" method="post">
      
            <label>Nome: </label>
            <input id="formatacaoForm" type="text" id="nome" name="nome" required><br>
       
            <label>Data de nascimento: </label>
            <input id="formatacaoForm" type="date" id="dataNascimento" name="dataNascimento" required><br>
            
            <label>Sexo: </label>
            <a>Feminino</a><input type="radio" name="sexo" value="Feminino">
            <a>Masculino</a><input type="radio" name="sexo" value="Masculino"> <br>     
            
            <label>E-mail: </label>
            <input id="formatacaoForm" type="text" id="email" name="email" required><br>
                   
            <label>Senha:</label>
            <input id="formatacaoForm" type="password" name="psw" required><br>
            
            <button type="submit" name="submit">Enviar</button>
   
        </form>
    </div>    
    </body>
</html>