<?php
// Ubah kredensial sesuai lingkup anda
$host = "localhost";
$user = "root";
$pass = "";
$db = "dbcoment";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Opsional: set charset UTF-4
mysqli_set_charset($conn, "utf8mb4");
?>