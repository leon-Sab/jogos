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
    include "includes/login.php";
    include "includes/funcoes.php";
    ?>
    <div id="corpo">
        <h1>Novo jogo</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <label for="nome">Nome do jogo:</label>
            <input type="text" id="nome" name="nome" required><br><br>
            <?php
            $produtoras = "SELECT * FROM produtoras";
            $generos = "SELECT * FROM generos";
            $result = $banco->query($produtoras);
                if ($result->num_rows > 0){ ?>
                    <label for="produtora">Produtora:</label>
                    <select name="cod" id="cod">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['cod']; ?>">
                            <?php echo $row['produtora']; ?>
                        </option>
                    <?php } ?>
                <?php } ?>
            </select>
            <br>
            <?php $result = $banco->query($generos);
                if ($result->num_rows > 0){ ?>
                    <label for="genero">Gênero:</label>
                    <select name="cod" id="cod">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['cod']; ?>">
                            <?php echo $row['genero']; ?>
                        </option>
                    <?php } ?>
                <?php } ?>
            </select>
            <br><br>
            <label for="nota">Nota do jogo:</label>
            <input type="number" step="any" id="nota" name="nota" max="10" min="0" required><br><br>

            <label for="descricao">Descrição do jogo:</label><br>
            <textarea id="descricao" name="descricao" rows="10" cols="30" required></textarea><br><br>

            <label for="capa">Capa do jogo:</label>
            <input type="file" id="capa" name="capa"><br><br>

            <button type="submit">Salvar</button>
        </form>
        <?php echo voltar(); ?>

    </div>
</body>

</html>