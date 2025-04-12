<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleLogin.css">
    <title>Tela de Login</title>
</head>
<body>


    <main class="container">
        <h1>Faça seu login</h1>

        <form method="post" action="../controller/LoginController.php">

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="input-group">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
        </div>

        <div class="button">
            <button type="submit">Entrar</button>
        </div>

        <div class="register">
            <p>Não tem uma conta? <a href="telaCadastro.php">Registre-se</a></p>
        </div>

        </form>


    </main>

</body>
</html>