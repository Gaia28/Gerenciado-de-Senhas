<?php 
    
    require '../database/config.php';
    require '../Views/telaCadastro.php';

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
                echo "<script> window.location.href='../Views/index.php';</script>";

            }else{
                echo "<script> alert('Erro ao cadastrar: " . $preparedStatement->error . "');</script>";
                $preparedStatement->close();
            }
                $connection->close();

        }

    }

?>
