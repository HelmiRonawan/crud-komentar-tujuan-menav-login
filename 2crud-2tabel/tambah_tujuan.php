<?php
include "koneksi.php";
// Ambil data dari form (POST)
$nama_tujuan = $_POST['nama_tujuan'] ?? '';
// Validasi sederhana
if (!empty($nama_tujuan))
{
 // Gunakan prepared statement agar lebih aman
$stmt = $conn->prepare("INSERT INTO tujuan (nama_tujuan) VALUES (?)");
$stmt->bind_param("s", $nama_tujuan);
if ($stmt->execute()) {
 echo "Data tujuan berhasil disimpan!";
} else {
 echo "Gagal menyimpan data: " . $stmt->error;
}
$stmt->close();
} else {
echo "Nama tujuan wajib diisi!";
}
// Tutup koneksi
$conn->close();
?>