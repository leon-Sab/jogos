<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Jogos Favoritos</title>
    <link rel="stylesheet" href="estilo/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <?php 
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        require_once "includes/login.php";
        $ordem = $_GET["o"] ?? "N";
        $chave = $_GET["c"] ?? "";
    ?>
    <div id="corpo">
        <?php include_once "menu.php"?>
        <h1>Escolha seu jogo!</h1>
        <form action="index.php" method="get" id="busca">
            Ordenar:
            <a href="index.php?o=N&c=<?php echo $chave;?>">Nome</a> |
            <a href="index.php?o=P&c=<?php echo $chave;?>">Produtora</a> |
            <a href="index.php?o=N1&c=<?php echo $chave;?>">Nota alta</a> |
            <a href="index.php?o=N2&c=<?php echo $chave;?>">Nota baixa</a> |
            Buscar: <input type="text" name="c" size="10" maxlength="40">
            <button type="submit">ok</button>
        </form>
        <table class="listagem">
            <?php 
                $q = "SELECT j.cod, j.nome, g.genero,p.produtora, j.descricao, j.nota, j.capa 
                FROM `jogos` j  
                JOIN generos g ON j.genero = g.cod 
                JOIN produtoras p ON j.produtora = p.cod ";
                if (!empty($chave)){
                    $q .= "WHERE j.nome LIKE '%$chave%' OR p.produtora LIKE '%$chave%' OR g.genero LIKE '%$chave%'";
                    }
                switch ($ordem){
                    case"P":
                        $q.= "ORDER BY p.produtora";
                        break;
                    case"N":
                        $q.= "ORDER BY j.nome";
                        break;
                    case"N1":
                        $q.= "ORDER BY j.nota DESC";
                        break;
                    case"N2":
                        $q.= "ORDER BY j.nota ";
                        break;
                    };
                $busca = $banco->query($q);
                    if (!$busca) {
                    echo "<tr><td>Falha na consulta: " . $banco->error . "";
                } else {
                    if ($busca->num_rows == 0) {
                        echo "<tr><td>Nenhum jogo encontrado.";
                    } else {
                        while($reg = $busca->fetch_object()) {
                            $tumb = thumb($reg->capa);
                            echo "<tr>";
                            echo "<td><img src='$tumb' class='mini' />";
                            echo "<td><a href='detalhes.php?cod={$reg->cod}'>{$reg->nome}</a>";
                            echo " [{$reg->genero}]<br> Produtora: {$reg->produtora}</td>";
                            if (is_admin()){
                                echo "<td>
                                <a href='games-form.php?cod={$reg->cod}'><span class='material-symbols-outlined'>edit</span></a>
                                <span class='material-symbols-outlined'>delete</span>
                                <span class='material-symbols-outlined'>add</span>";
                                }elseif (is_editor()){
                                 
                                echo "<td><span class='material-symbols-outlined'>edit</span>";
                            }
                        }
                    }
                }
            ?>
        </table>
    </div>
    <?php include "rodape.php";?>
</body>

</html>