<?php
// cadastro_adm_process.php

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        // Criptografa a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Insere os dados na tabela `usuarios` (tipo: adm)
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, tipo) 
                               VALUES (:nome, :email, :senha, 'adm')");
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhaHash
        ]);

        echo "<script>alert('Administrador cadastrado com sucesso!');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Erro ao cadastrar administrador: " . $e->getMessage() . "');</script>";
    }
}
?>