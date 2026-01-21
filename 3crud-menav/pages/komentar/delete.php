<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("DELETE FROM komentar WHERE id_komentar = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute())
{
$stmt->close();
$conn->close();
header("Location: index.php?page=komentar");
exit;
}
else
{
echo "Gagal menghapus data: " . $stmt->error;
$stmt->close();
$conn->close();
exit;
}
?>