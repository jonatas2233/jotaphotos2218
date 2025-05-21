<?php
// Inclui o arquivo de conexão com o banco de dados
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $email = trim($_POST['email']); // Remove espaços extras
    $senha = trim($_POST['senha']); // Remove espaços extras

    try {
        // Consulta o banco de dados para verificar o email
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            // Email não encontrado
            echo "<script>alert('Email não cadastrado.');</script>";
            echo "<script>window.location.href = '../login.html';</script>";
            exit();
        }

        // Verifica se a senha está correta
        if (password_verify($senha, $usuario['senha'])) {
            // Login bem-sucedido
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['tipo'] = $usuario['tipo'];

            // Redireciona com base no email
            if ($email === 'teste1@gmail.com') {
                header('Location: ../cliente1.html'); // Redireciona para cliente1.html
                exit();
            } elseif ($email === 'teste2@gmail.com') {
                header('Location: ../cliente2.html');
                exit();
            } elseif ($email === 'teste3@gmail.com') {
                header('Location: ../cliente3.html');
                exit();
            } elseif ($email === 'admin@gmail.com') {
                header('Location: ../admin.html');
                exit();
            } else {
                // Redireciona para a página inicial ou outra página padrão
                header('Location: ../index.html');
                exit();
            }
        } else {
            // Senha incorreta
            echo "<script>alert('Senha incorreta. Tente novamente.');</script>";
            echo "<script>window.location.href = '../login.html';</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Erro ao realizar login: " . $e->getMessage() . "');</script>";
        echo "<script>window.location.href = '../login.html';</script>";
    }
} else {
    // Método de requisição inválido
    http_response_code(405); // Define o código de erro HTTP 405
    echo "<script>alert('Método de requisição inválido!');</script>";
    echo "<script>window.location.href = '../login.html';</script>";
}
?>