<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
// Ambil data dari form (POST)
$nama_tujuan= $_POST['nama_tujuan'] ?? '';
// Validasi sederhana
if (!empty($nama_tujuan)) {
$stmt = $conn->prepare("INSERT INTO tujuan (nama_tujuan) VALUES (?)");
$stmt->bind_param("s", $nama_tujuan);
if ($stmt->execute()) {
header("Location: index.php?page=tujuan");
exit;
} else {
echo "Gagal menyimpan data: " . $stmt->error;
}
$stmt->close();
} else {
echo "Nama tujuan wajib diisi!";
}
// Tutup koneksi
$conn->close();
}
?>

<h2>Masukkan Data Tujuan</h2>
<form method="POST">
nama tujuan <input type="text" name="nama_tujuan"><br>
<input type="submit" value="Simpan">
</form>