<?php
include "koneksi.php";
$hasil = $conn->query("select id_komentar, nim, nama, komentar from komentar");
while($d = $hasil->fetch_assoc() )
{
echo "<a href=form_edit_komentar.php?id=".$d['id_komentar'].">Edit</a> "
."<a href='hapus_komentar.php?id=$d[id_komentar]' onclick=\"return confirm('Yakin akan hapus ID $d[id_komentar] dan nama $d[nama] ?');\">Hapus</a> | "
.$d['id_komentar']."-".$d['nim']."-".$d['nama']."-".$d['komentar']."<br>";
}
?>
