<?php
include "koneksi.php";
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT id_tujuan, nama_tujuan FROM tujuan WHERE id_tujuan = ?");
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
<form action="update_tujuan.php" method="POST">
id <input type="text" name="id_tujuan"
value="<?php echo htmlspecialchars($data['id_tujuan']); ?>" readonly><br>
nama tujuan<input type="text" name="nama_tujuan"
value="<?php echo htmlspecialchars($data['nama_tujuan']); ?>"><br>
<input type="submit" value="Simpan">
</form>
</body>
</html>