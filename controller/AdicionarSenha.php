<?php 
session_start();
require '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $site = $_POST['site'];
    $usuario = $_POST['usuario']; 
    $senha = $_POST['senha'];

    $email_user = $_SESSION['email'];
    $querySQL = 'SELECT id_user FROM usuarios WHERE email_user = ?';
    $preparedStatment = $connection->prepare($querySQL);
    $preparedStatment->bind_param('s', $email_user);
    $preparedStatment->execute();
    $result = $preparedStatment->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $fk_userId = $row['id_user'];
    }


    $querySQL = 'INSERT INTO senhas (id_password, fk_userId, email, name_password) VALUES (?, ?, ?, ?)';

    $preparedStatment = $connection->prepare($querySQL);
    $preparedStatment->bind_param('siss', $senha, $fk_userId, $usuario, $site);
    
    if ($preparedStatment->execute()) {
        echo "<script>alert('Senha adicionada com sucesso!'); window.location.href='../views/paginaInicial.php';</script>";
        exit;
    } else {
        echo "Erro ao inserir: " . $preparedStatment->error;
    }

    $preparedStatment->close();
    $connection->close();
}else{
    echo "<script>alert('Erro ao cadastrar a senha!');</script>";
    echo "<script>window.location.href='../views/paginaInicial.php';</script>";
    exit;
}

?>
