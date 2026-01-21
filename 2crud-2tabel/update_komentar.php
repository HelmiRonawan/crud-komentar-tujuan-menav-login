<?php
include "koneksi.php";
// Ambil data dari form (POST)
$id_komentar = $_POST['id_komentar'] ?? '';
$nim = $_POST['nim'] ?? '';
$nama = $_POST['nama'] ?? '';
$id_tujuan = $_POST['id_tujuan'] ?? '';
$komentar = $_POST['komentar'] ?? '';
// Validasi sederhana
if (!empty($id_komentar) && !empty($nim) && !empty($nama) && !empty($komentar) && !empty($id_tujuan)) {
// Gunakan prepared statement untuk UPDATE
$stmt = $conn->prepare("UPDATE komentar SET nim = ?, nama = ?, id_tujuan = ?, komentar = ? WHERE id_komentar = ?");
$stmt->bind_param("ssisi", $nim, $nama, $id_tujuan, $komentar, $id_komentar);
if ($stmt->execute()) {
if ($stmt->affected_rows > 0) {
echo "Data komentar berhasil diperbarui!";
} else {
echo "Tidak ada perubahan data atau ID tidak ditemukan.";
}
} else {
echo "Gagal memperbarui data: " . $stmt->error;
}
$stmt->close();
} else {
echo "Semua field (ID, NIM, Nama, Komentar) wajib diisi!";
}
// Tutup koneksi
$conn->close();
?>