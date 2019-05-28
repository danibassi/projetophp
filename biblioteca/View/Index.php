<!DOCTYPE html>
<?php
    $_SESSION = array();
    session_destroy();
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <title>Página Inicial</title>        
    </head>
    
    <body> 
        <header>
            <nav>
                <ul class="ul">                
                    <li class="li"><a href="MenuFuncionario.php">Menu do Funcionario</a></li>
                </ul>
            </nav>
        </header> 

        <div align="center">
            <form action="../Control/autenticarUsuario.php" method="post">
                <label for="username">Username:</label>
                <input type="text" placeholder="Enter Username" name="username" id="username" required><br>

                <label for="password">Password:</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" required><br>

                <input type="submit" value="Login">
            </form>
        </div>  
    </body>   
</html>
        