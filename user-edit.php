<!DOCTYPE html>
<html lang="pt-BR">
<?php
    include "includes/banco.php";
    include "includes/funcoes.php";
    include "includes/login.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modelo.php</title>
    <link rel="stylesheet" href="estilo/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <div id="corpo">
        <?php
            if(!is_logado()){
                echo msgAviso("efetue o <a href='user-login.php'>login</a> para acessar esta página.");
                echo voltar();
            }else{
                if(!isset($_POST['usuario'])){
                    include "user-edit-form.php";
                }else{
                    echo msgSucesso("dados foram recebidos");
                }
            }
        ?>     
    </div>
</body>
</html>