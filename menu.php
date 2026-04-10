<?php
    echo"<p class='pequeno'>";
    if(empty($_SESSION['nome'])){
        echo"<a href='user-login.php'>entrar</a>";
    }else{
        echo "boas vindas ".$_SESSION['user'];
        echo"<a href='user-logout.php'>sair</a>";
    }

    echo"</p>";
?>