<?php
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([
            ':email' => $email,
            ':password' => $passwordHash
        ]);
        $message = "Đăng ký thành công!";
    } catch (PDOException $e) {
        $message = "Email đã tồn tại!";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Đăng ký</h2>
<form method="post">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>
<p><?= $message ?></p>
<a href="login.php">Đăng nhập</a>
</body>
</html>
