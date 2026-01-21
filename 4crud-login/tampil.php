<?php
//atasi Warning: Cannot modify header information - headers already sent by output buffering
ob_start();
// Layout dan routing sederhana
include 'includes/header.php';
include 'includes/menu.php';
include 'includes/koneksi.php';
if (!is_logged_in())
{
 $page = isset($_GET['page']) ? $_GET['page'] : 'public';
 $action = isset($_GET['action']) ? $_GET['action'] : 'landingpage';
}
else
{
 $page = isset($_GET['page']) ? $_GET['page'] : 'home';
 if (current_role() === 'admin')
 $action = isset($_GET['action']) ? $_GET['action'] : 'admin';
 if (current_role() === 'pegawai')
 $action = isset($_GET['action']) ? $_GET['action'] : 'pegawai';
}
$path = "pages/$page/$action.php";
if (file_exists($path)) {
 include $path;
} else {
 echo "<h3>Halaman tidak ditemukan.</h3>";
}
include 'includes/footer.php';
?>