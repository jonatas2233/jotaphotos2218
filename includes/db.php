<?php
$host = 'localhost';
$dbname = 'jota_photos';
$username = 'root'; // Usuário padrão do XAMPP
$password = '';     // Senha padrão do XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>