<?php
// includes/auth_check.php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/auth_helpers.php';
// pastikan login
if (!is_logged_in()) {
 header('Location: index.php?page=public&action=login');
 exit;
}
// idle timeout (mis. 30 menit)
$idleLimit = 30 * 60;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $idleLimit) {
 auth_logout();
 header('Location: index.php?page=public&action=login?msg=timeout');
 exit;
}
$_SESSION['last_activity'] = time();
// simple user agent check (opsional)
if (isset($_SESSION['user_agent']) && $_SESSION['user_agent'] !== ($_SERVER['HTTP_USER_AGENT'] ?? '')) {
 auth_logout();
 header('Location: index.php?page=public&action=login?msg=anomaly');
 exit;
}
// require role helper
function require_role($roles = []) {
 if (!is_array($roles)) $roles = [$roles];
 $role = current_role();
 if (!in_array($role, $roles)) {
 // opsi: tampil pesan atau redirect ke halaman forbidden
 header('HTTP/1.1 403 Forbidden');
 echo "<h3>Akses ditolak — Anda tidak punya izin untuk melihat halaman ini.</h3>";
 exit;
 }
}
?>