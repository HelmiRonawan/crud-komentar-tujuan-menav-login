<?php
header('Content-Type: application/json');
include "koneksi.php";
$hasil = $conn->query("SELECT id_tujuan, nama_tujuan FROM tujuan");
$data = [];
while ($row = $hasil->fetch_assoc()) {
 $data[] = $row;
}
echo json_encode($data);
?>