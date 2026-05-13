<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Informações</title>
    <link rel="stylesheet" href="estilo/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <?php
    include "includes/banco.php";
    include "includes/funcoes.php";
    ?>
    <div id="corpo">
    
    <form action="" method="POST">
        <table id="busca">
            <?php
                $cod = intval($_GET['cod'] ?? 0);
                if ($cod <= 0) {
                    echo msgErro("código inválido");
                } else {
                    if ($_POST) {
                        $nome = $banco->real_escape_string($_POST['nome']);
                        $nota = $banco->real_escape_string($_POST['nota']);
                        $descricao = $banco->real_escape_string($_POST['descricao']);
                        $banco->query("UPDATE jogos SET nome='$nome', nota='$nota', descricao='$descricao' WHERE cod=$cod");
                        echo msgSucesso("registro atualizado com sucesso");
                    }

                    $busca = $banco->query("SELECT * FROM jogos WHERE cod=$cod");
                    if ($busca->num_rows == 0) {
                        echo msgErro("registro não encontrado");
                    } else {
                        $reg = $busca->fetch_object();
                        echo "<tr><th colspan='2'>Editar informações do jogo</th></tr>";
                        echo "<tr>";
                        echo "<td rowspan='4'><img src='" . thumb($reg->capa) . "' class='max' alt='Capa do jogo' /></td>";
                        echo "<td><label for='nome'>Nome:</label><input type='text' id='nome' name='nome' value='" . htmlspecialchars($reg->nome, ENT_QUOTES) . "'></td>";
                        echo "</tr>";
                        echo "<tr><td><label for='nota'>Nota:</label><input type='number' step='any' id='nota' name='nota' max='10' min='0' value='" . htmlspecialchars($reg->nota, ENT_QUOTES) . "'></td></tr>";
                        echo "<tr><td><label for='descricao'>Descrição:</label><textarea id='descricao' name='descricao' rows='10' cols='30'>" . htmlspecialchars($reg->descricao) . "</textarea></td></tr>";
                        echo "<tr><td><button type='submit'>Salvar</button></td></tr>";
                    }
                }
            
            ?>
        </table>
        <?php echo voltar(); ?>
    </form>
        
        
    </div>
    
</body>
</html>