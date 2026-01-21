<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
// Ambil data dari form (POST)
$nim = $_POST['nim'] ?? '';
$id_tujuan= $_POST['id_tujuan'] ?? '';
$nama = $_POST['nama'] ?? '';
$komentar = $_POST['komentar'] ?? '';
// Validasi sederhana
if (!empty($nim) && !empty($nama) && !empty($komentar)) {
$stmt = $conn->prepare("INSERT INTO komentar (nim,id_tujuan, nama, komentar) VALUES (?, ?, ?, ?)");
$stmt->bind_param("siss", $nim, $id_tujuan, $nama, $komentar);
if ($stmt->execute()) {
header("Location: index.php?page=komentar&action=list");
exit;
} else {
echo "Gagal menyimpan data: " . $stmt->error;
}
$stmt->close();
} else {
echo "Semua field (NIM, Nama, Komentar) wajib diisi!";
}
// Tutup koneksi
$conn->close();
}
?>

<h2>Masukkan Data Komentar</h2>
<form method="POST">
nim <input type="text" name="nim"><br>
nama <input type="text" name="nama"><br>
Tujuan
<select name="id_tujuan" id="id_tujuan">
<option value="">-- Pilih Tujuan --</option>
</select><br>
Komentar <input type="text" name="komentar"><br>
<input type="submit" value="Simpan">
</form>
<script>
// Ambil data tujuan dari PHP (JSON)
fetch('pages/komentar/get_tujuan.php')
.then(response => response.json())
.then(data => {
let select = document.getElementById('id_tujuan');
data.forEach(item => {
let option = document.createElement('option');
option.value = item.id_tujuan;
option.text = item.nama_tujuan;
select.appendChild(option);
});
})
.catch(error => console.error('Gagal mengambil data tujuan:', error));
</script>