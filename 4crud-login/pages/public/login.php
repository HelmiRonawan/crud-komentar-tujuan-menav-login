<?php
require_once 'includes/koneksi.php';
require_once 'includes/auth_helpers.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $username = mysqli_real_escape_string($conn, $_POST['username']);
 $password = $_POST['password'];
 $q = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' LIMIT 1");
 if ($q && $row = mysqli_fetch_assoc($q)) {
 if (password_verify($password, $row['password'])) {
 auth_login_user($row);
 header('Location: /crud-komentar-tujuan-menav-login/4crud-login/index.php');
 exit;
 }
 }
 $error = "Username atau password salah.";
}
ob_end_flush();
?>
<h2>Login</h2>
<form method="post">
 <table>
 <tr><td>Username</td><td><input name="username" required></td></tr>
 <tr><td>Password</td><td><input type="password" name="password" required></td></tr>
 <tr><td></td><td><button type="submit">Login</button></td></tr>
 </table>
</form>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>