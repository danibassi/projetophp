<?php
    require_once '../DAO/AutorDAO.php';
    require_once '../Classes/Autor.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset = "utf-8">
        <title>Ver cadastro</title>
        <style>
            #stusuarios {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            #stusuarios td, #stusuarios th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            #stusuarios tr:nth-child(even){
                background-color: #f2f2f2;
            }

            #stusuarios tr:hover {
                background-color: #ddd;
            }

            #stusuarios th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
        <?php
            $autorDAO = new AutorDAO(new Autor);
        ?>
        <table id="stusuarios">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Data de Nascimento</td>
                    <td>Sexo</td>
                </tr>
            </thead>
            <?php $value = $autorDAO->select(0);?>
            <tbody>
                <tr>
                    <td><?php echo $value[0];?></td>
                    <td><?php echo $value['aut_dt_nascimento'];?></td>
                    <td><?php echo $value['aut_sexo'];?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
