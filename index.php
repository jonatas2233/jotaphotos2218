<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
</head>
<body>

<h2>Cadastro de Usuário</h2>

<!-- Formulário para cadastrar o usuário -->
<form action="processar.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required><br><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required><br><br>

    <input type="submit" value="Cadastrar">
</form>

</body>
</html>
