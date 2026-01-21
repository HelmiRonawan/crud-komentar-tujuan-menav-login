<?php
include "koneksi.php";
$hasil = $conn->query(
"
SELECT k.id_komentar, k.nim, k.nama, t.nama_tujuan, k.komentar
FROM komentar as k
LEFT JOIN tujuan as t ON t.id_tujuan=k.id_tujuan
");
while($d = $hasil->fetch_assoc() )
{
 echo "<a href=form_edit_komentar.php?id=".$d['id_komentar'].">Edit</a> "
."<a href='hapus_komentar.php?id=$d[id_komentar]' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data dengan ID $d[id_komentar] ?');\">Hapus</a> | "
.$d['id_komentar']." - ".$d['nim']." - ".$d['nama']." - "
.$d['nama_tujuan']." - ".$d['komentar']."<br>";
}
?>