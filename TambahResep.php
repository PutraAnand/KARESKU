<?php
include '../db.php'; // Pastikan jalur ini benar

session_start(); // Memulai session

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php'); // Redirect ke halaman login jika belum login
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $bahan = $_POST['bahan'];
    $langkah = $_POST['langkah'];
    $user_id = $_SESSION['user_id']; // Mendapatkan ID pengguna dari session

    // Menyimpan resep baru ke database
    $stmt = $pdo->prepare("INSERT INTO resep (judul, bahan, langkah, user_id) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$judul, $bahan, $langkah, $user_id])) {
        header('Location: SimpanResep.php'); // Redirect setelah berhasil
        exit();
    } else {
        $error = "Gagal menyimpan resep, silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/Logo.png" />
    <link rel="stylesheet" href="tambah.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Resep - Karesku</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-restaurant"></i>
            <span class="logo_name">Karesku</span>
        </div>
        <ul>
            <li><a href="/resep/akun.php">Beranda</a></li>
            <li><a href="SimpanResep.php">Resep Disimpan</a></li>
            <li><a href="TambahResep.php" class="active">Tambahkan Resep</a></li>
            <li><a href="#">Keluar</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Tambahkan Resep</h1>
        <form method="POST" action="TambahResep.php">
            <input type="hiddenluname="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
            <div class="add-recipe-container">
                <input type="text" name="judul" id="recipeTitle" placeholder="Judul" required />
                <textarea name="bahan" id="recipeIngredients" rows="3" placeholder="Bahan" required></textarea>
                <textarea name="langkah" id="recipeInstructions" rows="5" placeholder="Langkah" required></textarea>
                <button type="submit">Tambah Resep</button>
            </div>
        </form>
    </div>
</body>
</html>