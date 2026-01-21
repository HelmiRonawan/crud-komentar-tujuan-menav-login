<h2>LIST Komentar</h2>
<?php
$hasil = $conn->query(
"SELECT k.id_komentar, k.nim, k.nama, t.nama_tujuan, k.komentar
 FROM komentar as k
 LEFT JOIN tujuan as t ON t.id_tujuan=k.id_tujuan
");
echo "<table border='1' cellpadding='3' cellspacing='0'>
 <tr>
 <th>ID</th>
 <th>Nama</th>
 <th>NIM</th>
 <th>Tujuan</th>
 <th>Komentar</th>
 </tr>";
while ($d = $hasil->fetch_assoc()) {
 echo "<tr>
 <td>{$d['id_komentar']}</td>
 <td>{$d['nama']}</td>
 <td>{$d['nim']}</td>
 <td>{$d['nama_tujuan']}</td>
 <td>{$d['komentar']}</td>
 </tr>";
}
echo "</table>";
?>