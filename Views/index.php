<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleLogin.css">
    <title>Tela de Login</title>
</head>
<body>

    <?php 
    
    require '../database/config.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $querySQL = 'SELECT * FROM usuarios where email_user = ?';
        $preparedStatment = $connection->prepare($querySQL);
        $preparedStatment->bind_param('s', $email);
        $preparedStatment->execute();

        $result = $preparedStatment->get_result();

        if($result->num_rows === 1)
        {
            $usuario = $result->fetch_assoc();

            if(password_verify($senha, $usuario['password_user'])){
                header('Location: ../Views/paginaInicial.php');
                exit;

            }
        }else{
            echo "<script>alert('Email ou senha incorretos!');</script>";
           
        }
        $preparedStatment->close();
        $connection->close();

    }
    
    ?>

    <main class="container">
        <h1>Faça seu login</h1>

        <form method="post">

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