<?php
require_once 'includes/auth_helpers.php';
// Hapus session
auth_logout();
// Arahkan kembali ke halaman login
header('Location: index.php');
exit;