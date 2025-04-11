<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleLogin.css">
    <title>Tela de Cadastro</title>
</head>
<body>

<?php 
    
    require '../database/config.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmarSenha = $_POST['confirmar-senha'];

        if($senha !== $confirmarSenha){
            echo "<script> alert('As senhas não coincidem!');</script>";
        
        }else{

            $querySQL = 'INSERT INTO usuarios (name_user, email_user, password_user) VALUES (?, ?, ?)';
            $preparedStatement = $connection ->prepare($querySQL);

            if(!$preparedStatement){
                die('Erro na preparação da consulta:' . $connection->error);
            }

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $preparedStatement->bind_param('sss', $nome, $email, $senhaHash);
            
            if($preparedStatement->execute()){
                echo "<script> alert('Cadastro realizado com sucesso!');</script>";

            }else{
                echo "<script> alert('Erro ao cadastrar: " . $preparedStatement->error . "');</script>";
                $preparedStatement->close();
            }
                $connection->close();

        }

    }

?>

<main class="container">
    <h1>Faça seu cadastro</h1>

    <form method="post">

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
