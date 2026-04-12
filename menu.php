<?php
    echo"<p class='pequeno'>";
    if(empty($_SESSION['nome'])){
        echo"<a href='user-login.php'>entrar</a>";
    }else{
        echo "Boas vindas <strong>".$_SESSION['user'] . "</strong>";
        echo " | Meus Dados | ";
        if (is_logado() && is_admin()){
            echo"Novo jogo | Novo usuario | ";
        }
        echo"<a href='user-logout.php'>Sair</a>";
    }

    echo"</p>";
?>