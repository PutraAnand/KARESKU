<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $bahan = $_POST['bahan'];
    $langkah = $_POST['langkah'];

    $sql = "UPDATE resep SET judul = :judul, bahan = :bahan, langkah = :langkah WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['judul' => $judul, 'bahan' => $bahan, 'langkah' => $langkah, 'id' => $id]);

    header("Location: SimpanResep.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM resep WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$resep = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/Logo.png" />
    <link rel="stylesheet" href="edit.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Resep</title>
</head>
<body>
    <div class="container">
        <h1>Edit Resep</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $resep['id']; ?>">

            <div class="form-group">
                <label for="judul">Judul Makanan</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $resep['judul']; ?>" required>
            </div>

            <div class="form-group">
                <label for="bahan">Bahan-Bahan</label>
                <textarea class="form-control" id="bahan" name="bahan" required><?php echo $resep['bahan']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="langkah">Cara Pem buatan</label>
                <textarea class="form-control" id="langkah" name="langkah" required><?php echo $resep['langkah']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="SimpanResep.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>