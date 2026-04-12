<table>
    <h1>Cadastrar Usuário</h1>
    <form action="user-new.php" method="POST">

        <tr><td>Usuário
                <input type="text" name="usuario" placeholder="Nome de usuário" required>
        <tr><td>Nome
                <input type="text" name="nome" placeholder="Nome completo" required>
         <tr><td>Senha
                <input type="password" name="senha1" placeholder="Senha" required>
        <tr><td>Confirmar senha
                <input type="password" name="senha2" placeholder="Repita a senha" required>
        <tr><td>Tipo de usuário
                <select name="tipo" required>
                    <option value="">Selecione</option>
                    <option value="admin">Administrador</option>
                    <option value="editor">editor</option>
                </select>
        <tr><td><button type="submit">Cadastrar</button>

    </form>
</table>