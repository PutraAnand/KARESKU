<?php
include 'db.php'; // Menghubungkan ke database
session_start(); // Memulai session

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Meng-hash password

    // Cek apakah username sudah ada
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->rowCount() > 0) {
        $error = "Username sudah terdaftar!"; // Pesan kesalahan jika username sudah ada
    } else {
        // Simpan pengguna baru ke database
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        if ($stmt->execute([$username, $hashed_password])) {
            $_SESSION['user_id'] = $pdo->lastInsertId(); // Menyimpan ID pengguna di session
            header('Location: akun.php'); // Redirect ke halaman akun
            exit();
        } else {
            $error = "Gagal mendaftar, silakan coba lagi."; // Pesan kesalahan jika gagal menyimpan
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>
<body>
    <main>
    <div class="register-container">
        <div class="logo">
            <img src="asset/Logo.png" alt="Logo" class="logo-icon">
        </div>
        <div>
            <p>
                Eksplorasi Dunia Resep Dengan Menyenangkan
            </p>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; // Menampilkan pesan kesalahan jika ada ?>
            <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="register-button" name="register" id="register">Register</button>
        </form>
        </div>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; // Menampilkan pesan kesalahan jika ada ?>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </main>
</body>
</html>