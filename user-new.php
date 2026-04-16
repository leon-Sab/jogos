<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuario</title>
    <link rel="stylesheet" href="estilo/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <?php
        include "includes/login.php";
        include "includes/banco.php";
        include "includes/funcoes.php";
        ?>
    <div id="corpo">
        <?php 
                if (!is_admin()){
                    echo msgAviso("Voçê nao tem acesso a essa pagina!");
                    echo voltar();
                }else{
                    if(!isset($_POST['usuario'])){
                        require "user-new-form.php";
                    }else{
                        $usuario = $_POST['usuario'] ?? null;
                        $nome = $_POST['nome'] ?? null;
                        $senha1 = $_POST['senha1'] ?? null;
                        $senha2 = $_POST['senha2'] ?? null;
                        $tipo = $_POST['tipo'] ?? null;
                        if ($senha1 === $senha2){
                            if(empty($usuario)||empty($nome)||empty($senha1)||empty($senha2)||empty($tipo)){
                                echo msgErro("Todos os campos são obrigatorios!");
                                echo voltar();
                            }else{
                                $senha = criarHash($senha1);
                                $q = "INSERT INTO `usuarios` (`usuario`, `nome`, `senha`, `tipo`) 
                                VALUES ('$usuario', '$nome', '$senha', '$tipo')";
                                $registro = $banco->query($q);
                                if($registro){
                                    echo msgSucesso("Usuario cadastrado com sucesso!");
                                    echo voltar();
                                }else{
                                    echo msgErro("Erro ao cadastrar usuario!");
                                    echo voltar();
                                }
                            }
                        } else {
                            echo msgErro("As senhas não coincidem!");
                            echo voltar();
                        }
                    }
                }
            ?>
    </div>
</body>

</html>