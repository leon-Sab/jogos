# Meus Jogos Favoritos

Sistema de gerenciamento de catálogo de jogos desenvolvido em PHP com banco de dados MySQL.

---

## 📋 Descrição

Este projeto é um sistema web para gerenciar um catálogo de jogos favoritos. Permite:
- Listar jogos com ordenação por nome, produtora ou nota
- Buscar jogos por nome, produtora ou gênero
- Visualizar detalhes de cada jogo
- Sistema de autenticação de usuários
- Gerenciamento de usuários (apenas administradores)

---

## 🛠️ Tecnologias

- **PHP** (versão 7.4 ou superior)
- **MySQL** / **MariaDB**
- **HTML/CSS** (com Google Material Symbols)
- **XAMPP** (servidor local recomendado)

---

## 📁 Estrutura do Projeto

```
jogos/
├── index.php              # Página principal - listagem de jogos
├── detalhes.php           # Visualização dos detalhes de um jogo
├── menu.php               # Menu de navegação (login/logout)
├── rodape.php             # Rodapé com informações do desenvolvedor
├── user-login.php         # Página de login
├── user-login-form.php    # Formulário de login
├── user-logout.php        # Script de logout
├── user-new.php           # Cadastro de novos usuários (admin only)
├── user-new-form.php      # Formulário de cadastro
├── user-edit.php          # Edição de dados do usuário
├── user-edit-form.php     # Formulário de edição
├── estilo/
│   └── style.css          # Arquivo de estilos CSS
├── includes/
│   ├── banco.php          # Conexão com banco de dados
│   ├── login.php          # Funções de autenticação e autorização
│   └── funcoes.php        # Funções auxiliares
├── fotos/                 # Pasta para imagens/capas dos jogos
├── icones/                # Pasta para ícones do sistema
└── banco.sql              # Script do banco de dados
```

---

## 🗄️ Estrutura do Banco de Dados

O arquivo `banco.sql` contém as seguintes tabelas:

### Tabela `jogos`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| cod | INT (PK) | Código do jogo |
| nome | VARCHAR(50) | Nome do jogo |
| produtora | INT (FK) | Código da produtora |
| genero | INT (FK) | Código do gênero |
| nota | DECIMAL(3,1) | Nota do jogo (0-10) |
| descricao | TEXT | Descrição do jogo |
| capa | VARCHAR(50) | Nome do arquivo da capa |

### Tabela `usuarios`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| cod | INT (PK) | Código do usuário |
| usuario | VARCHAR(20) | Nome de usuário (único) |
| nome | VARCHAR(40) | Nome completo |
| senha | VARCHAR(60) | Senha criptografada |
| tipo | CHAR(1) | Tipo: 'admin' ou 'editor' |

### Tabelas auxiliares
- `generos` - Gêneros dos jogos
- `produtoras` - Produtoras dos jogos

---

## 🚀 Instalação

### Passo 1: Configurar o ambiente
1. Instale o XAMPP (ou outro servidor PHP/MySQL)
2. Inicie os serviços **Apache** e **MySQL** no XAMPP

### Passo 2: Criar o banco de dados
1. Acesse o phpMyAdmin: `http://localhost/phpmyadmin`
2. Crie um novo banco de dados chamado `jogos`
3. Clique na aba "Importar"
4. Selecione o arquivo `banco.sql` e clique em "Executar"

### Passo 3: Configurar a conexão
O arquivo `includes/banco.php` já vem configurado com:
```php
$banco = new mysqli("localhost", "root", "", "jogos");
```
- **Servidor**: localhost
- **Usuário**: root
- **Senha**: (vazia)
- **Banco**: jogos

Se necessário, ajuste essas informações.

### Passo 4: Acessar o sistema
Abra o navegador e akses: `http://localhost/jogos`

### Passo 5: Login inicial
- **Usuário**: admin
- **Senha**: admin123

---

## 👥 Tipos de Usuário

| Tipo | Permissões |
|------|------------|
| **admin** | Visualizar jogos, buscar, editar, excluir, cadastrar usuários |
| **editor** | Visualizar jogos, buscar, editar |

---

## 📖 Como Usar

### Na página principal (index.php)
1. **Ordenar**: Clique em Nome, Produtora, Nota alta ou Nota baixa
2. **Buscar**: Digite no campo de busca e clique em "ok"
3. **Ver detalhes**: Clique no nome do jogo

### Menu de navegação
- **Entrar**: Faz login no sistema
- **Meus Dados**: Edita seus dados de usuário
- **Novo jogo**: Cadastra novo jogo (apenas admin)
- **Novo usuário**: Cadastra novo usuário (apenas admin)
- **Sair**: Faz logout

---

## 📝 Funções Principais

### includes/login.php
- `gerarCripto($senha)` - Criptografa a senha com César simples
- `criarHash($senha)` - Cria hash seguro da senha
- `testarHash($senha, $hash)` - Verifica se a senha está correta
- `is_logado()` - Verifica se há usuário logado
- `is_admin()` - Verifica se o usuário é administrador
- `is_editor()` - Verifica se o usuário é editor

### includes/funcoes.php
- `thumb($arquivo)` - Retorna o caminho da miniatura/capa
- `voltar()` - Retorna link para voltar à página inicial
- `msgErro($msg)` - Exibe mensagem de erro
- `msgSucesso($msg)` - Exibe mensagem de sucesso
- `msgAviso($msg)` - Exibe mensagem de aviso

---

## ⚙️ Configurações

### Arquivo: includes/banco.php
Para alterar a conexão com o banco:
```php
$banco = new mysqli("servidor", "usuario", "senha", "banco");
```

### Arquivo: estilo/style.css
Personalize as cores, fontes e layout do sistema.

---

## 📌 Observações

- O sistema usa sessões PHP para controle de autenticação
- As senhas são criptografadas com password_hash() + César simples
- As imagens dos jogos devem ser salvas na pasta `fotos/`
- O arquivo `indisponivel.png` é usado como imagem padrão

---

## 📄 Licença

Este projeto foi desenvolvido por gustavo guanabara na plataforma estudonalta curso php com msql.

pode haver algumas mudanças na implementaçao.