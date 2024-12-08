<?php 
include '../db.php';
require_once("../dompdf/autoload.inc.php");

$id = $_GET['id'];
$sql = "SELECT * FROM resep WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$resep = $stmt->fetch(PDO::FETCH_ASSOC);

// Inisialisasi Dompdf
$dompdf = new Dompdf\Dompdf();

// Buat konten HTML untuk PDF
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Resep</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .resep { margin: 20px; }
    </style>
</head>
<body>
    <div class="resep">
        <h1>'. htmlspecialchars($resep['judul']) .'</h1>
        <h2>Bahan:</h2>
        <p>'. nl2br(htmlspecialchars($resep['bahan'])) .'</p>
        <h2>Langkah:</h2>
        <p>'. nl2br(htmlspecialchars($resep['langkah'])) .'</p>
    </div>
</body>
</html>
';

// Load HTML ke Dompdf
$dompdf->loadHtml($html);

// Atur ukuran kertas dan orientasi
$dompdf->setPaper('A4', 'portrait');

// Render PDF
$dompdf->render();

// Simpan PDF
$output = 'resep_' . $id . '.pdf';
$dompdf->stream($output, ['Attachment' => 0]);
?>