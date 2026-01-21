<?php
header('Content-Type: application/json');
include "../../includes/koneksi.php";
if ($conn->connect_error) {
die(json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]));
}
$hasil = $conn->query("SELECT id_tujuan, nama_tujuan FROM tujuan");
$data = [];
while ($row = $hasil->fetch_assoc()) {
$data[] = $row;
}
echo json_encode($data);
?>