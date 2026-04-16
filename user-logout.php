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
    include "includes/login.php"
    ?>
    <div id="corpo">
        <?php 
            echo logout();
            echo msgSucesso("usuario desconectado!!");
            echo voltar();
        ?>
    </div>
</body>
</html>