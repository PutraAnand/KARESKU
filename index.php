<?php
include 'db.php';
session_start();

$query = $pdo->query("SELECT * FROM resep");
$resep = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Karesku </title>
</head>

<body>
<header>
        <nav class="navbar">
            <div class="left-section">
                <img src="asset/Logo.png" alt="Logo" class="logo-icon">
            </div>
        <input type="text" placeholder="Search" class="search-bar">
            <div class="right-section">
                <a href="login.php" class="btn_login">Log In</a>
                <a href="register.php" class="btn_register">Register</a>
            </div>
        </nav>
</header>

<div class="banner">
            <img src="asset/banner.jpeg" alt="Banner">
        </div>

        <section class="info-section">
            <div class="info-card">
                <h2>Mau masak Apa hari Ini?</h2>
                <p>Melalui fitur pencarian di Karesku, kamu dapat menemukan resep berdasarkan bahan atau nama hidangan, memastikan kamu selalu mendapat inspirasi masak setiap harinya.</p>
            </div>
            <div class="info-image">
                <img src="asset/food.jpeg" alt="Food 1">
            </div>
        </section>

        <section class="info-section">
            <div class="info-card">
                <h2>Simpan Resep Kesukaanmu</h2>
                <p>Melalui fitur Simpan resep, kamu dapat menyimpan resep orang lain untuk dimasak di kemudian hari.</p>
            </div>
            <div class="info-image">
                <img src="asset/drink.jpeg" alt="Drink 1">
            </div>
        </section>
    </main>

    </header>
    </header>
    <main>
        <h2>Resep Terbaru</h2>
        <div id="resep-container">
            <?php foreach ($resep as $r): ?>
                <div class="resep">
                    <h3><?php echo htmlspecialchars($r['judul']); ?></h3>
                    <p><strong>Bahan:</strong> <?php echo nl2br(htmlspecialchars($r['bahan'])); ?></p>
                    <p><strong>Langkah:</strong> <?php echo nl2br(htmlspecialchars($r['langkah'])); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Berbagi Resep Makanan</p>
    </footer>
</body>
</html>