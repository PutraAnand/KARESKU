<?php
include '../db.php'; // Make sure this points to your database connection file

session_start(); // Start the session for CSRF token

// Generate a CSRF token if it doesn't exist
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die('Invalid CSRF token');
    }

    // Sanitize user input
    $judul = htmlspecialchars(trim($_POST['judul']));
    $bahan = htmlspecialchars(trim($_POST['bahan']));
    $langkah = htmlspecialchars(trim($_POST['langkah']));

    try {
        // Save recipe to the database
        $sql = "INSERT INTO resep (judul, bahan, langkah) VALUES (:judul, :bahan, :langkah)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['judul' => $judul, 'bahan' => $bahan, 'langkah' => $langkah]);

        // Redirect to the recipe list page after successful insert
        header("Location: SimpanResep.php");
        exit;
    } catch (PDOException $e) {
        // Handle error (you can log this error or show a user-friendly message)
        echo "Error: " . $e->getMessage();
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
            <li><a href="akun.php">Beranda</a></li>
            <li><a href="SimpanResep.php">Resep Disimpan</a></li>
            <li><a href="TambahResep.php" class="active">Tambahkan Resep</a></li>
            <li><a href="#">Keluar</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Tambahkan Resep</h1>
        <form method="POST" action="TambahResep.php">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
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