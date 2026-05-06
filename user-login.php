<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    require_once "includes/login.php";
    ?>
    <div id="corpo">
        <?php 
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;
            if(is_null($u) || is_null($s)){
                require "user-login-form.php";
            }
            else{
                $q = "SELECT usuario, nome, senha, tipo 
                      from usuarios where usuario = '$u'";
                $busca = $banco->query($q);
                if (!$busca){
                    echo msgErro("Ocorreu um erro! verifique o nome ou a senha");
                } else {
                    if ($busca->num_rows == 0) {
                            echo "Usuário não encontrado";
                    } else {
                        $reg = $busca->fetch_object();
                        if(!testarHash($s,$reg->senha)){
                            echo msgAviso("Verifique a senha!");
                        }else{
                            $_SESSION['user'] = $reg->usuario;
                            $_SESSION['nome'] = $reg->nome;
                            $_SESSION['tipo'] = $reg->tipo;
                            echo msgSucesso("Bem Vindo, ". $_SESSION['nome']);
                        }
                    }
                }
            }
        ?>
        <?php echo "<br>". voltar()?>
    </div>
</body>

</html>