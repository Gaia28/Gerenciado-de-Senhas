<?php 

require '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $site = $_POST['site'];
    $usuario = $_POST['usuario']; // Corrigido aqui
    $senha = $_POST['senha'];

    $querySQL = 'INSERT INTO senhas (password, email, name_password) VALUES (?, ?, ?)';

    $preparedStatment = $connection->prepare($querySQL);
    $preparedStatment->bind_param('sss', $senha, $usuario, $site);
    
    if ($preparedStatment->execute()) {
        echo "<script>alert('Senha adicionada com sucesso!'); window.location.href='../views/principal.php';</script>";
        exit;
    } else {
        echo "Erro ao inserir: " . $preparedStatment->error;
    }

    $preparedStatment->close();
    $connection->close();
}

?>
