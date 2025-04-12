<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleLogin.css">
    <title>Tela de Cadastro</title>
</head>
<body>

<main class="container">
    <h1>Faça seu cadastro</h1>

    <form method="post" action="../controller/CadastroController.php">

        <div class="input-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="input-group">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
        </div>

        <div class="input-group">
            <label for="confirmar-senha">Confirmar Senha</label>
            <input type="password" id="confirmar-senha" name="confirmar-senha" required>
        </div>

        <div class="button">
            <button type="submit">Cadastrar</button>
        </div>

    </form>
</main>

</body>
</html>
