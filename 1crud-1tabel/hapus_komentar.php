<?php
include "koneksi.php";
$id = $_GET['id'];
// Gunakan prepared statement untuk keamanan
$stmt = $conn->prepare("DELETE FROM komentar WHERE id_komentar = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
echo "Data dengan ID $id berhasil dihapus.<br>";
} else {
echo "Gagal menghapus data: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
<a href="tampil_komentar.php">Kembali ke daftar komentar</a>