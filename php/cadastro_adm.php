<?php
session_start();

// Verifica se o usuário está logado como administrador
if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'adm') {
    header("Location: login.php"); // Redireciona para a página de login
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administrador</title>
    <link rel="stylesheet" href="css/cliente.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="logo-text">
                <h1>Jota Photos</h1>
            </div>
        </div>
    </header>

    <div class="form-container">
        <h2>Cadastro de Administrador</h2>
        <form id="form-cadastro-adm" action="cadastro_adm_process.php" method="POST">
            <fieldset>
                <legend>Informações Pessoais</legend>

                <div class="input-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
            </fieldset>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Jota Photos - Todos os direitos reservados.</p>
    </footer>
</body>
</html>