<?php
    echo"<p class='pequeno'>";
    if(empty($_SESSION['nome'])){
        echo"<a href='user-login.php'>entrar</a>";
    }else{
        echo "Boas vindas <strong>".$_SESSION['nome'] . "</strong>";
        echo " | <a href='user-edit.php'>Meus Dados</a> | ";
            if (is_admin()){
                echo"<a href='user-new.php'> Novo usuario </a>| 
                <a href ='games-form-new.php'>Novo Jogo</a> | ";
                 
            }
        echo"<a href='user-logout.php'>Sair</a>";
    }

    echo"</p>";
?>