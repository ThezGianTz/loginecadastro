<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Cadastrar Usuário</h1>
        <form method="POST" action="cadastrar_action.php">
            <label>
                Nome: <input type="text" name="nome" required/>
            </label>
            <label>
                Email: <input type="email" name="email" required/>
            </label>
            <label>
                Senha: <input type="password" name="senha" required/>
            </label>
            <input type="submit" value="Salvar"/>
        </form>
    </div>
</body>
</html>
