<?php
$servidor = "localhost";  // ou o endereço do seu servidor
$usuario = "root";        // Usuário padrão
$senha = "";              // Deixe vazio se não houver senha configurada
$banco = "clientes";  // O banco de dados que você quer acessar

// Criação da conexão
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificação da conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
?>
