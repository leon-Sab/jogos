<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modelo.php</title>
    <link rel="stylesheet" href="estilo/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <?php
    include "includes/banco.php";
    include "includes/funcoes.php";
    ?>
    <div id="corpo">
    
    <form action="" method="post">
        <table id="busca">
        <tr>
            <th>descrição do jogo</th>
        </tr>
            <?php
                $cod=$_GET['cod'];
                $busca = $banco->query("SELECT * FROM jogos WHERE cod=$cod");
                
                if(!$busca){
                    msgErro("registro não encontrado");
                    }else{    
                        $reg = mysqli_fetch_object($busca);
                        echo"<tr><td><img src='".thumb($reg->capa)."' class='mini' /></td></tr>";
                        
                        echo"<tr><td><label for='nome'>Nome:</label></td>";
                        echo"<td><input type='text' id='nome' name='nome' value='{$reg->nome}'></td></tr>";
                        
                        echo"<tr><td><label for='nota'>Nota:</label></td>";
                        echo"<td><input type='number' id='nota' name='nota' value='{$reg->nota}'></td></tr>";
                        
                        echo"<tr><td><label for='descricao'>Descrição:</label></td>";
                        echo"<td><textarea id='descricao' name='descricao' rows='10' cols='30' >{$reg->descricao}</textarea></td></tr>";
                        
                        
                        echo"<tr><td><button type='submit'>Salvar</button></td></tr>";

                } 
            ?> 
             
        </table>    
        </form>
        
        
    </div>
    
</body>
</html>