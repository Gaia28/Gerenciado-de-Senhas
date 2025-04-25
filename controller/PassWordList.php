<?php 
require '../database/config.php';

if(!isset($_SESSION['id'])) {
    echo "<script>alert('Usuário não identificado!');</script>";
    echo "<script>window.location.href='../Views/index.php';</script>";
    exit;
}

$idUser = $_SESSION['id'];
$querySQL = 'SELECT name_password, email, password_add FROM senhas WHERE fk_userId = ?';
$preparedStatment = $connection->prepare($querySQL);
$preparedStatment->bind_param('i', $idUser);
$preparedStatment->execute();

$result = $preparedStatment->get_result();

if($result->num_rows > 0):
    while($row = $result->fetch_assoc()):
        $uniqueId = uniqid("modal_"); // ID único para cada modal
?>
    <div class="password-item" data-modal="<?php echo $uniqueId; ?>">
        <p>Nome do site: <?php echo htmlspecialchars($row['name_password']); ?></p>
        <p>Email/Usuário: <?php echo htmlspecialchars($row['email']); ?></p>
        <p>Senha: <?php echo htmlspecialchars($row['password_add']); ?></p>
    </div>

    <dialog id="<?php echo $uniqueId; ?>">
        <button class="close-modal" data-modal="<?php echo $uniqueId; ?>">X</button>
        <h3><?php echo htmlspecialchars($row['name_password']); ?></h3>
        <p><strong>Usuário:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
        <p><strong>Senha:</strong> <?php echo htmlspecialchars($row['password_add']); ?></p>
    </dialog>
<?php
    endwhile;
else:
    echo "<p>Você ainda não adicionou nenhuma senha.</p>";
endif;

$preparedStatment->close();
$connection->close();
?>
