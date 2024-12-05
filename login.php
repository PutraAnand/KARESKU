<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mencari pengguna berdasarkan username
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Memverifikasi password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: akun.php');
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <main>
    <div class="login-container">
        <div class="logo">
            <img src="asset/Logo.png" alt="Logo" class="logo-icon">
        </div>
        <div>
            <p>
                Eksplorasi Dunia Resep Dengan Menyenangkan
            </p>
        </div>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <div>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="login-button">Log In</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </main>
</body>
</html>