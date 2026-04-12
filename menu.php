<?php
    echo"<p class='pequeno'>";
    if(empty($_SESSION['nome'])){
        echo"<a href='user-login.php'>entrar</a>";
    }else{
        echo "Boas vindas <strong>".$_SESSION['user'] . "</strong>";
        echo " | Meus Dados | ";
            if (is_admin()){
                echo"Novo jogo |
                 <a href='user-new.php'>Novo usuario </a>| ";
            }
        echo"<a href='user-logout.php'>Sair</a>";
    }

    echo"</p>";
?>