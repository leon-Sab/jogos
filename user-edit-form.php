<h1>edição de usuario</h1>
<table>
<form action="user-edit.php" method="post">
    
        <tr>
            <td>usuario
            <td><input type="text" id="nome" name="nome" placeholder="Nome de usuario" readonly
                    value="<?php echo $_SESSION['nome']; ?>">
        <tr>
            <td>nome
            <td><input type="text" id="usuario" name="usuario" placeholder="Nome completo"
                    value="<?php echo $_SESSION['user']; ?>">
            </td>
        </tr>
        <tr>
            <td>
                tipo
            <td><input type="text" placeholder="Tipo de usuário" readonly value="<?php echo $_SESSION['tipo']; ?>">
            </td>
        </tr>
        <tr>
            <td>senha
            <td><input type="password" id="senha1" name="senha1" placeholder="Senha">
            </td>
        </tr>
        <tr>
            <td>repita a senha
            <td><input type="password" id="senha2" name="senha2" placeholder="Repita a senha">
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="salvar alterações"></td>
        </tr>

</form>
</table>