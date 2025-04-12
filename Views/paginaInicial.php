<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylePrincipal.css">
    <title>Document</title>

</head>
<header>
    <h1>Bem vindo ao seu gerenciador de senhas</h1>
</header>
<body>

<main class="container">

<p class="message">Gerencia suas senhas de forma prática e segura</p>

<div class="button-group">

    <button class="add-button" data-modal="modal-1" >Adicionar senha</button>
        <dialog id="modal-1">
            <button class="close-modal" data-modal="modal-1">X</button>
            <h2>Adicionar senha</h2>

            <form method="post">

                <label for="site">Nome do Site</label>
                <input type="text" id="site" name="site" required>

                <label for="usuario">Usuário ou Email</label>
                <input type="text" id="usuario" name="usuario" required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>

                <button type="submit">Adicionar</button>
            </form>

                

        </dialog>

    <button class = "edit-button">Editar senha</button>
    <button class = "delete-button">Deletar senha</button>
    <button class="trash-button">Lixeira</button>

</div>



<div class="password-list">
    <h2>Lista de senhas</h2>

    <div class="password-list">

        <div class="password-item">
            <p>Nome do site: Google</p>
            <p>Senha: ********</p>
            <p>Data de criação: 01/01/2023</p>

        </div>
        

    </div>


</main>
    
<script src="../interactions/scriptModal.js"></script>

</body>
</html>