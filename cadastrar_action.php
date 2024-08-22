<?php
require 'config.php';

// Inicializa a variável de mensagem de erro
$error_message = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    // Verifica se todos os campos foram preenchidos
    if ($nome && $email && $senha) {
        // Prepara e executa a consulta para inserir o novo usuário
        $sql = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        // Redireciona para a página de login após o cadastro
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Todos os campos são obrigatórios.";
    }
}
?>