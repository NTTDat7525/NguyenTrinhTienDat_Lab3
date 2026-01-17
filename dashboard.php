<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Dashboard</h2>
<p>Xin chào, <?= $_SESSION['user'] ?></p>
<a href="logout.php">Đăng xuất</a>
</body>
</html>
