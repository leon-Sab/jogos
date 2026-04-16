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
    <title>ediçao dados usuario</title>
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
                if(!isset($_POST['usuario']) || empty($_POST['usuario'])){
                    include "user-edit-form.php";
                }else{
                    $usuario = $_POST['usuario'];
                    $nome = $_POST['nome'];
                    $senha1 = $_POST['senha1'];
                    $senha2 = $_POST['senha2'];
                    
                    $nomeMudou = ($nome != $_SESSION['nome']);
                    $senhaMudou = (!empty($senha1) && $senha1 == $senha2);
                    
                    if($senhaMudou && $senha1 != $senha2){
                        echo msgErro("as senhas não conferem.");
                        echo voltar();
                    }else{
                        $setParts = [];
                        if($nomeMudou) $setParts[] = "nome='$nome'";
                        if($senhaMudou) $setParts[] = "senha='" . criarHash($senha1) . "'";
                        
                        if(empty($setParts)){
                            echo msgAviso("nenhum dado foi alterado. a senha antiga foi mantida.");
                            echo voltar();
                        }else{
                            $q = "UPDATE usuarios SET " . implode(', ', $setParts) . " WHERE usuario='$usuario'";
                            if($banco->query($q)){
                                if($nomeMudou && $senhaMudou){
                                    echo msgSucesso("dados atualizados com sucesso!");
                                }elseif($nomeMudou){
                                    echo msgSucesso("nome atualizado com sucesso!");
                                }elseif($senhaMudou){
                                    echo msgSucesso("senha alterada com sucesso!");
                                }
                                echo voltar();
                            }else{
                                echo msgErro("erro ao atualizar dados.");
                                echo voltar();
                            }
                        }
                    }
                }
            }
        ?>     
    </div>
</body>
</html>