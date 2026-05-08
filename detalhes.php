<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detalhes do jogo</title>
    <link rel="stylesheet" href="estilo/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <?php
    include "includes/banco.php";
    include "includes/funcoes.php";
    ?>
    <div id="corpo">
        <table class="detalhes">
            <tr>
                <th>descrição do jogo</th>
            </tr>
            <?php

            $cod = $_GET['cod'] ?? $cod = 0;
            
            $busca = $banco->query("SELECT * FROM jogos WHERE cod=$cod");
            if (!$busca) {
                echo "falha na busca";
            } else {
                if ($busca->num_rows != 1) {
                    echo "jogo não encontrado";
                } else {
                    $reg = $busca->fetch_object();
                    echo "<tr><td rowspan='3'><img src='" . thumb($reg->capa) . "' class='max' />";
                    echo "<td><h2>{$reg->nome}</h2>";
                    echo "nota: {$reg->nota}/10     ";
                    echo "<a href='games-form.php?cod={$reg->cod}'><span class='material-symbols-outlined'>edit</span><br>";
                    echo "<tr><td>{$reg->descricao}";
                    
                }
            }
            ?>
        </table>
        <?php echo voltar(); ?>
    </div>
    <?php
    include "rodape.php";
    ?>
</body>

</html>