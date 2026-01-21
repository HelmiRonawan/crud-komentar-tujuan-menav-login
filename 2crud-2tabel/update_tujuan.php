<?php
include "koneksi.php";
// Ambil data dari form (POST)
$id_tujuan = $_POST['id_tujuan'] ?? '';
$nama_tujuan = $_POST['nama_tujuan'] ?? '';
// Validasi sederhana
if (!empty($id_tujuan) && !empty($nama_tujuan)) {
// Gunakan prepared statement untuk UPDATE
$stmt = $conn->prepare("UPDATE tujuan SET nama_tujuan = ? WHERE id_tujuan = ?");
$stmt->bind_param("si", $nama_tujuan, $id_tujuan);
if ($stmt->execute()) {
if ($stmt->affected_rows > 0) {
echo "Data tujuan berhasil diperbarui!";
} else {
echo "Tidak ada perubahan data atau ID tidak ditemukan.";
}
} else {
echo "Gagal memperbarui data: " . $stmt->error;
}
$stmt->close();
} else {
echo "Nama tujuan wajib diisi!";
}
// Tutup koneksi
$conn->close();
?>