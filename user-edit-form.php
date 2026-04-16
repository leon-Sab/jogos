<h1>edição de usuario</h1>
<table>
<form action="user-edit.php" method="post">
        <tr>
            <td>usuario</td>
            <td><input type="text" id="usuario" name="usuario" placeholder="Nome de usuario" readonly
                    value="<?php echo $_SESSION['user']; ?>"></td>
        </tr>
        <tr>
            <td>nome</td>
            <td><input type="text" id="nome" name="nome" placeholder="Nome completo"
                    value="<?php echo $_SESSION['nome']; ?>"></td>
        </tr>
        <tr>
            <td>tipo</td>
            <td><input type="text" placeholder="Tipo de usuário" readonly value="<?php echo $_SESSION['tipo']; ?>"></td>
        </tr>
        <tr>
            <td>senha</td>
            <td><input type="password" id="senha1" name="senha1" placeholder="Senha"></td>
        </tr>
        <tr>
            <td>repita a senha</td>
            <td><input type="password" id="senha2" name="senha2" placeholder="Repita a senha"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="salvar alterações"></td>
        </tr>
</form>
</table>