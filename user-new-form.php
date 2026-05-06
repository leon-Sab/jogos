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
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        require_once "includes/login.php";
        ?>
    <div id="corpo">
<table>

<?php
    if(!is_logado() || !is_admin()){
        echo msgErro("você não tem permissão para acessar esta página");
        echo voltar();

    } else {
        ?>
        <tr><th><h1>Cadastrar Usuário</h1>
        <form action="user-new.php" method="POST">

        <tr><td>Usuário
                <td><input type="text" name="usuario" placeholder="Nome de usuário" required>
        <tr><td>Nome
                <td><input type="text" name="nome" placeholder="Nome completo" required>
         <tr><td>Senha
                <td><input type="password" name="senha1" placeholder="Senha" required>
        <tr><td>Confirmar senha
                <td><input type="password" name="senha2" placeholder="Repita a senha" required>
        <tr><td>Tipo de usuário
                <td><select name="tipo" required>
                    <option value="">Selecione</option>
                    <option value="admin">Administrador</option>
                    <option value="editor">editor</option>
                </select>
        <tr><td><button type="submit">Cadastrar</button>

    </form>
    </table>
    <?php }?>