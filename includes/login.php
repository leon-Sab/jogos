<?php
    session_start();
    if(!isset($_SESSION['user'])){
        $_SESSION['user']="";
        $_SESSION['nome']="";
        $_SESSION['tipo']="";
    }
    function gerarCripto($senha){
        $crip= '';
        for($i=0 ; $i < strlen($senha);$i++){
            $letra = ord($senha[$i])+1;
            $crip .= chr($letra);
        }
        return $crip;
    }
    
    function criarHash($senha){
        $hash = password_hash(gerarCripto($senha),PASSWORD_DEFAULT);
        return $hash;
    }
    function testarHash($senha, $hash){
        $test = password_verify(gerarCripto($senha),$hash);
        return $test;
    }
    function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['nome']);
        unset($_SESSION['tipo']);
    }