<?php
session_start();
require '../../includes/db.php';
require '../../controllers/AuthController.php';
$authController = new AuthController($pdo);
$steamApiKey = $config['STEAM_API_KEY'];
$steamApiKeyValid = !empty($steamApiKey) && strlen($steamApiKey) === 32;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = $authController->register($username, $email, $password);
}
?>
<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>
<div class="form-container">
    <h2>Registrar</h2>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="register.php" method="post">
        <div class="form-group">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Registrar</button>
    </form>
    <div class="steam-login <?php echo !$steamApiKeyValid ? 'btn-disabled' : ''; ?>">
        <a href="steam_login.php" class="btn btn-steam" <?php echo !$steamApiKeyValid ? 'onclick="return false;"' : ''; ?>>
            <img src="../../assets/icons/steam-logo.png" alt="Steam Logo">
            Registrar com Steam
        </a>
    </div>
</div>
<?php include '../../includes/footer.php'; ?>