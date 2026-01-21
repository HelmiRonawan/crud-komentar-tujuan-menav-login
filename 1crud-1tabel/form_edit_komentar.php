<?php
include "koneksi.php";
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT id_komentar, nim, nama, komentar FROM komentar WHERE
id_komentar = ?");
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
komentar: <input type="text" name="komentar"
 value="<?php echo htmlspecialchars($data['komentar']); ?>"><br>
<input type="submit" value="Simpan">
</form>
</body>
</html>