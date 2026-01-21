<?php
include "koneksi.php";
$hasil = $conn->query(
"
SELECT id_tujuan, nama_tujuan
FROM tujuan
");
while($d = $hasil->fetch_assoc() )
{
 echo "<a href=form_edit_tujuan.php?id=".$d['id_tujuan'].">Edit</a> "
."<a href='hapus_tujuan.php?id=$d[id_tujuan]' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data dengan ID $d[id_tujuan] ?');\">Hapus</a> | "
.$d['id_tujuan']." - ".$d['nama_tujuan']."<br>";
}
?>