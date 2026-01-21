<?php
require_once __DIR__ . '/auth_helpers.php';
?>
<nav>
<?php
if (!is_logged_in())
{
?>
 <a href="index.php?page=public&action=landingpage">Home</a> |
 <a href="index.php?page=public&action=komentar">Komentar</a> |
 <a href="index.php?page=public&action=login">Login</a>
<?php
}
?>
<?php if (is_logged_in() && current_role() === 'admin'): ?>
 <a href="index.php?page=home&action=admin">Home</a> |
 <a href="index.php?page=komentar&action=list">komentar</a> |
 <a href="index.php?page=tujuan&action=list">tujuan</a> |
 <a href="index.php?page=public&action=logout">Logout</a>
<?php endif; ?>
<?php if (is_logged_in() && current_role() === 'pegawai'): ?>
 <a href="index.php?page=home&action=pegawai">Home</a> |
 <a href="index.php?page=komentar&action=list">komentar</a> |
 <a href="index.php?page=public&action=logout">Logout</a>
<?php endif; ?>
</nav>
<hr>