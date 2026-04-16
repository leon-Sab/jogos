<table>
    <h1>Cadastrar Usuário</h1>
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