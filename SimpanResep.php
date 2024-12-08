<?php
include '../db.php';

// Mengambil data resep dari database
$sql = "SELECT * FROM resep";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resepList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/Logo.png" />
    <link rel="stylesheet" href="simpan.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Resep - Karesku</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-restaurant"></i>
            <span class="logo_name">Karesku</span>
        </div>
        <ul>
            <li><a href="/resep/akun.php">Beranda</a></li>
            <li><a href="SimpanResep.php" class="active">Resep Disimpan</a></li>
            <li><a href="TambahResep.php">Tambahkan Resep</a></li>
            <li><a href="#">Keluar</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Daftar Resep</h1>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Bahan</th>
                    <th>Cara Pembuatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($resepList)): ?>
                    <tr>
                        <td colspan="4">Tidak ada resep yang disimpan.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($resepList as $resep): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($resep['judul']); ?></td>
                        <td><?php echo htmlspecialchars($resep['bahan']); ?></td>
                        <td><?php echo htmlspecialchars($resep['langkah']); ?></td>
                        <td>
                            <button onclick="editRecipe(<?php echo $resep['id']; ?>)">Edit</button>
                            <button onclick="deleteRecipe(<?php echo $resep['id']; ?>)">Hapus</button>
                            <button onclick="printRecipe(<?php echo $resep['id']; ?>)">Cetak</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function editRecipe(id) {
            window.location.href = 'edit_resep.php?id=' + id;
        }

        function deleteRecipe(id) {
            if (confirm("Apakah Anda yakin ingin menghapus resep ini?")) {
                window.location.href = 'hapus_resep.php?id=' + id;
            }
        }

        function printRecipe(id) {
            window.open('print_resep.php?id=' + id, '_blank');
        }
    </script>
</body>
</html>