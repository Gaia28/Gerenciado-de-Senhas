<?php 
require '../database/config.php';
session_start();

if(!isset($_SESSION['id']) || !isset($_POST['id_password'])) {
    echo "<script>alert('Acesso invalido!');</script>";
    echo "<script>window.location.href='../Views/index.php';</script>";
    exit;
}

$idUser = $_SESSION['id'];
$idPassword = $_POST['id_password'];

$querySQL = 'DELETE FROM senhas WHERE id_password = ? AND fk_userId = ?';
$preparedStatment = $connection->prepare($querySQL);
$preparedStatment->bind_param('ii', $idPassword, $idUser);

if($preparedStatment->execute()) {
    echo "<script>alert('Senha deletada com sucesso!');</script>";
} else {
    echo "<script>alert('Erro ao deletar senha.');</script>";
}

$preparedStatment->close();
$connection->close();
header("Location: ../Views/paginaInicial.php");
exit;

?>