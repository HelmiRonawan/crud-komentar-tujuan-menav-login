<?php
$conn = new mysqli("localhost","root","","dbcoment");
if ($conn->connect_error) {
die("Koneksi gagal: " . $conn->connect_error);
}