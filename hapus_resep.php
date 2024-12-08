<?php
include '../db.php';
$id = $_GET['id'];
$sql = "DELETE FROM resep WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

header("Location: SimpanResep.php");
?>