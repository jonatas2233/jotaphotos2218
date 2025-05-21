<?php
// Inclui o arquivo de conexão com o banco de dados
require_once '../includes/db.php'; // Certifique-se de que o caminho está correto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; // Nova variável para a senha
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    try {
        // Insere os dados na tabela `clientes`
        $stmtClientes = $pdo->prepare("INSERT INTO clientes (nome, telefone, cpf, whatsapp, email, endereco, bairro, cidade) 
                                       VALUES (:nome, :telefone, :cpf, :whatsapp, :email, :endereco, :bairro, :cidade)");
        $stmtClientes->execute([
            ':nome' => $nome,
            ':telefone' => $telefone,
            ':cpf' => $cpf,
            ':whatsapp' => $whatsapp,
            ':email' => $email,
            ':endereco' => $endereco,
            ':bairro' => $bairro,
            ':cidade' => $cidade
        ]);

        // Criptografa a senha antes de inserir na tabela `usuarios`
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Insere os dados na tabela `usuarios` (tipo padrão: cliente)
        $stmtUsuarios = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, tipo) 
                                       VALUES (:nome, :email, :senha, 'cliente')");
        $stmtUsuarios->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senhaHash
        ]);

        echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        echo "<script>window.location.href = '../index.html';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Erro ao cadastrar: " . $e->getMessage() . "');</script>";
        echo "<script>window.location.href = '../cadastro_cliente.html';</script>";
    }
} else {
    echo "<script>alert('Método de requisição inválido!');</script>";
    echo "<script>window.location.href = '../cadastro_cliente.html';</script>";
}
?>