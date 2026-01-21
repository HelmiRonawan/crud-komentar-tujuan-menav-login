<?php
// includes/auth_helpers.php
if (session_status() === PHP_SESSION_NONE) {
 session_start();
}
// Set cookie params (panggil sebelum session_start() di bootstrap jika ingin konsisten)
function auth_start() {
 if (session_status() === PHP_SESSION_NONE) {
 session_start();
 }
}
// Simpan info user setelah login sukses
function auth_login_user($userRow) {
 session_regenerate_id(true); // cegah session fixation
 $_SESSION['user'] = [
 'id' => $userRow['id'],
 'username' => $userRow['username'],
 'role' => $userRow['role'],
 'fullname' => $userRow['fullname'] ?? ''
 ];
 $_SESSION['last_activity'] = time();
 $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'] ?? '';
}
// cek apakah ada user login
function is_logged_in() {
 return isset($_SESSION['user']['username']);
}
// ambil role user saat ini atau null
function current_role() {
 return $_SESSION['user']['role'] ?? null;
}
// ambil username / detail
function current_user() {
 return $_SESSION['user'] ?? null;
}
// logout
function auth_logout() {
 $_SESSION = [];
 if (ini_get('session.use_cookies')) {
 setcookie(session_name(), '', time() - 42000, '/');
 }
 session_destroy();
}
?>