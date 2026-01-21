<?php
include "koneksi.php";
// Ambil data dari form (POST)
$nim = $_POST['nim'] ?? '';
$nama = $_POST['nama'] ?? '';
$komentar = $_POST['komentar'] ?? '';
// Validasi sederhana
if (!empty($nim) && !empty($nama) && !empty($komentar)) {
// Gunakan prepared statement agar lebih aman
$stmt = $conn->prepare("INSERT INTO komentar (nim, nama, komentar) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nim, $nama, $komentar);
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