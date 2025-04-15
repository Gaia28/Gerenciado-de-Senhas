<?php 
    session_start();
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

                $_SESSION['email'] = $usuario['email_user'];
                $_SESSION['nome'] = $usuario['name_user']; 


                header('Location: ../Views/paginaInicial.php');
                exit;

            }
        }else{
            echo "<script>alert('Email ou senha incorretos!');</script>";
            echo "<script>window.location.href='../Views/index.php';</script>";
           
        }
        $preparedStatment->close();
        $connection->close();

    }
    
    ?>