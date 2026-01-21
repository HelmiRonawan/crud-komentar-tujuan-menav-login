<?php
//atasi Warning: Cannot modify header information - headers already sent by output buffering
ob_start();

// layout dan routing sederhana
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/koneksi.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$path = "pages/$page/$action.php";
if (file_exists($path)) {
include $path;
} else {
echo "<h3>Halaman tidak ditemukan.</h3>";
}

include 'includes/footer.php';
?>