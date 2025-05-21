<?php
$servidor = "localhost"; // ou o seu servidor
$usuario = "root"; // usuário do banco de dados
$senha = ""; // senha do banco de dados
$dbname = "clientes"; // nome do banco de dados

// Criando a conexão
$conn = new mysqli($servidor, $usuario, $senha, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
