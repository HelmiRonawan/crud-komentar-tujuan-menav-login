<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("SELECT * FROM komentar WHERE id_komentar = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
die("Data dengan ID tersebut tidak ditemukan.");
}
$data = $result->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id_komentar = $_POST['id_komentar'] ?? '';
$nim = $_POST['nim'] ?? '';
$nama = $_POST['nama'] ?? '';
$id_tujuan = $_POST['id_tujuan'] ?? '';
$komentar = $_POST['komentar'] ?? '';
$stmt = $conn->prepare("UPDATE komentar SET nim = ?, nama = ?, id_tujuan = ?, komentar = ? WHERE id_komentar = ?");
$stmt->bind_param("ssisi", $nim, $nama, $id_tujuan, $komentar, $id_komentar);
if ($stmt->execute()) {
if ($stmt->affected_rows > 0) {
header("Location: index.php?page=komentar");
exit;
} else {
echo "Tidak ada perubahan data atau ID tidak ditemukan.";
}
} else {
echo "Gagal memperbarui data: " . $stmt->error;
}
}
?>

<h2>Edit Komentar</h2>
<form method="POST">
id <input type="text" name="id_komentar"
value="<?php echo htmlspecialchars($data['id_komentar']); ?>" readonly><br>
nim <input type="text" name="nim"
value="<?php echo htmlspecialchars($data['nim']); ?>"><br>
nama <input type="text" name="nama"
value="<?php echo htmlspecialchars($data['nama']); ?>"><br>
Tujuan
<select name="id_tujuan" id="id_tujuan">
<option value="">-- Pilih Tujuan --</option>
</select><br>
komentar: <input type="text" name="komentar"
value="<?php echo htmlspecialchars($data['komentar']); ?>"><br>
<input type="submit" value="Simpan">
</form>
<script>
const currentTujuan = "<?php echo htmlspecialchars($data['id_tujuan']); ?>";
fetch('pages/komentar/get_tujuan.php')
.then(response => response.json())
.then(data => {
let select = document.getElementById('id_tujuan');
data.forEach(item => {
let option = document.createElement('option');
option.value = item.id_tujuan;
option.text = item.nama_tujuan;
if (item.id_tujuan === currentTujuan) {
option.selected = true;
}
select.appendChild(option);
});
})
.catch(error => console.error('Gagal mengambil data tujuan:', error));
</script>