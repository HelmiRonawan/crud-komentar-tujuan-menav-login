//fungsi untuk menampilkan tabel komentar atau tujuan

<?php
function list_tabel($tabel)
{
include "koneksi.php";
// Ambil nama kolom dari tabel
$fields = [];
$result = $conn->query("DESCRIBE $tabel");
while ($row = $result->fetch_assoc()) {
$fields[] = $row['Field'];
}
// Ambil data dari tabel
$data = $conn->query("SELECT * FROM $tabel");
// Tampilkan HTML tabel
echo "<table><tr>";
// Header tabel
foreach ($fields as $f) {
echo "<th>" . strtoupper($f) . "</th>";
}
echo "</tr>";
// Baris data
while ($row = $data->fetch_assoc()) {
echo "<tr>";
foreach ($fields as $f) {
echo "<td>" . htmlspecialchars($row[$f]) . "</td>";
}
echo "</tr>";
}
echo "</table>";
}
?>