<?php
include "koneksi.php";
// Ambil data dari form (POST)
$nim = $_POST['nim'] ?? '';
$nama = $_POST['nama'] ?? '';
$komentar = $_POST['komentar'] ?? '';
$id_tujuan= $_POST['id_tujuan'] ?? '';
// Validasi sederhana
if (!empty($nim) && !empty($nama) && !empty($komentar) && !empty($id_tujuan))
{
 // Gunakan prepared statement agar lebih aman
$stmt = $conn->prepare("INSERT INTO komentar (nim, nama, id_tujuan ,komentar) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $nim, $nama, $id_tujuan, $komentar);
if ($stmt->execute()) {
 echo "Data komentar berhasil disimpan!";
} else {
 echo "Gagal menyimpan data: " . $stmt->error;
}
$stmt->close();
} else {
echo "Semua field (NIM, Nama, Komentar) wajib diisi!";
}
// Tutup koneksi
$conn->close();
?>