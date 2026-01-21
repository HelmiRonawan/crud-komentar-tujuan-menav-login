<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("SELECT * FROM tujuan WHERE id_tujuan = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
die("Data dengan ID tersebut tidak ditemukan.");
}
$data = $result->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id_tujuan = $_POST['id_tujuan'] ?? '';
$nama_tujuan = $_POST['nama_tujuan'] ?? '';
$stmt = $conn->prepare("UPDATE tujuan SET nama_tujuan = ? WHERE id_tujuan = ?");
$stmt->bind_param("si", $nama_tujuan, $id_tujuan);
if ($stmt->execute()) {
if ($stmt->affected_rows > 0) {
header("Location: index.php?page=tujuan&action=list");
exit;
} else {
echo "Tidak ada perubahan data atau ID tidak ditemukan.";
}
} else {
echo "Gagal memperbarui data: " . $stmt->error;
}
}
?>

<h2>Edit Tujuan</h2>
<form method="POST">
id <input type="text" name="id_tujuan"
value="<?php echo htmlspecialchars($data['id_tujuan']); ?>" readonly><br>
nama tujuan <input type="text" name="nama_tujuan"
value="<?php echo htmlspecialchars($data['nama_tujuan']); ?>"><br>
<input type="submit" value="Simpan">
</form>