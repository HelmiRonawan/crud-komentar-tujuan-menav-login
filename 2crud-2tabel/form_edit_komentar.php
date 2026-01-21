<?php
include "koneksi.php";
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT id_komentar, nim, nama, id_tujuan, komentar FROM komentar WHERE id_komentar = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
 die("Data dengan ID tersebut tidak ditemukan.");
}
$data = $result->fetch_assoc();
?>
<html>
<body>
<h2>Edit Komentar</h2>
<form action="update_komentar.php" method="POST">
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
// Simpan id_tujuan yang sedang aktif (dari PHP)
const currentTujuan = "<?php echo htmlspecialchars($data['id_tujuan']); ?>";
// Ambil data tujuan dari PHP (JSON)
fetch('get_tujuan.php')
.then(response => response.json())
.then(data => {
let select = document.getElementById('id_tujuan');
data.forEach(item => {
let option = document.createElement('option');
option.value = item.id_tujuan;
option.text = item.nama_tujuan;
// Jika id_tujuan ini sama dengan data yg sedang diedit, tandai sebagai selected
if (item.id_tujuan === currentTujuan) {
option.selected = true;
}
select.appendChild(option);
});
})
.catch(error => console.error('Gagal mengambil data tujuan:', error));
</script>
</body>
</html>