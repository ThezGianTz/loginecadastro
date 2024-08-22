<?php
require 'config.php';

// Inicializa a variável de mensagem de erro
$error_message = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    // Prepara a consulta para verificar o usuário
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->bindValue(1, $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    // Verifica se o usuário existe e a senha está correta
    if ($user && $senha === $user['senha']) {
        // Login bem-sucedido, redireciona para a página inicial
        header("Location: inicio.php");
        exit;
    } else {
        // Login falhou
        $error_message = "Email ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="index.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            
            <button type="submit">Entrar</button>
        </form>
        <div class="message">
            <p>Não tem uma conta? <a href="cadastrar.php">Registrar</a></p>
        </div>
        <?php
        // Exibe mensagem de erro se houver
        if (!empty($error_message)) {
            echo "<p>$error_message</p>";
        }
        ?>
    </div>
</body>
</html>
