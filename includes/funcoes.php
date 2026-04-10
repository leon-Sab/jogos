<?php 
    function thumb($arquivo){
        $caminho = "fotos/$arquivo";
        if (is_null($caminho) || !file_exists($caminho)){
            return "fotos/indisponivel.png";
        }else {
            return $caminho;    
        }
    }
    function voltar(){
        return "<a href='index.php'>
            <span class='material-symbols-outlined'>arrow_back</span>
        </a>";
    }
    function msgErro($msg){
        return"<div class='erro'>
            <span class='material-symbols-outlined'>
                Warning</span>$msg
        </div>    
        ";
    }
    function msgSussesso($msg){
        return "
        <div class='sucesso'>
            <span class='material-symbols-outlined'>
                check_circle</span>$msg
        </div>    
        ";
    }
    function msgAviso($msg){
        return "<div class='aviso'>
            <span class='material-symbols-outlined'>
                error</span>$msg
        </div>"; 
    }
?>