<?php 
session_start();

if(!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
}

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylePrincipal.css">
    <link rel="stylesheet" href="../styles/styleModal.css">
    
    <title>Página Inicial</title>
</head>

<body>
    <header>
        
        <h1>Bem vindo ao seu gerenciador de senhas</h1>
       
        <div class="logout"> 
        <a href='?logout=true'>Sair</a>     
        
        </div>

        <div class="infoUser">
            <p> Olá <br> <i class = "fas fa-user"></i>
            <?php echo $_SESSION['nome']; ?></p>
        </div>
    </header>

    <main class="container">
        <p class="message">Gerencie suas senhas de forma prática e segura</p>
        
        <div class="button-group">
            <button class="add-button" data-modal="modal-1">Adicionar senha</button>
            
            <dialog id="modal-1">
                <button class="close-modal" data-modal="modal-1">X</button>
                <h2>Adicionar senha</h2>
                <div id="modal-form">
                    <form method="post" action="../controller/AdicionarSenha.php">
                        <div class = "form-group">  
                            <label for="site">Nome do Site</label>
                            <input type="text" id="site" name="site" required>
                        </div>
                       
                        <div class="form-group">
                            <label for="usuario">Usuário ou Email</label>
                            <input type="text" id="usuario" name="usuario" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" name="senha" required>

                        </div>
                        
                        <button type="submit">Adicionar</button>
                    </form>
                </div>
            </dialog>
            
        </div>
        
        <div class="password-list">
            <h2>Lista de senhas</h2>
        
            <?php include '../controller/PassWordList.php'; ?>

            
            

</div>

    </main>
    
    <script src="../interactions/scriptModal.js"></script>
</body>
</html>