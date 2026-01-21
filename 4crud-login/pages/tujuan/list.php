<h2>LIST Komentar</h2>
<a href="index.php?page=tujuan&action=add">[+] Tambah Tujuan</a>

<?php
$hasil = $conn->query(
"
SELECT id_tujuan, nama_tujuan
FROM tujuan
");

echo "<table border='1' cellpadding='3' cellspacing='0'>
<tr>
<th>ID</th>
<th>Nama Tujuan</th>
<th>Aksi</th>
</tr>";
while ($d = $hasil->fetch_assoc()) {
echo "
<tr>
<td>{$d['id_tujuan']}</td>
<td>{$d['nama_tujuan']}</td>
<td>
<a href='index.php?page=tujuan&action=edit&id={$d['id_tujuan']}'>Edit</a> |
<a href='index.php?page=tujuan&action=delete&id={$d['id_tujuan']}'
onclick=\"return confirm('Apakah Anda yakin ingin menghapus data dengan ID {$d['id_tujuan']}?');\">Hapus</a>
</td>
</tr>";
}
echo "</table>";

?>