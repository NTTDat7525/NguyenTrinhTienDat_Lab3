<?php
session_start();

$products = [
    1 => "Áo thun",
    2 => "Quần jean",
    3 => "Giày sneaker"
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['add'])) {
    $_SESSION['cart'][] = $_GET['add'];
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Danh sách sản phẩm</h2>
<ul>
<?php foreach ($products as $id => $name): ?>
    <li>
        <?= $name ?>
        <a href="?add=<?= $id ?>">[Thêm vào giỏ]</a>
    </li>
<?php endforeach; ?>
</ul>

<h2>Giỏ hàng</h2>
<ul>
<?php
foreach ($_SESSION['cart'] as $id) {
    echo "<li>$products[$id]</li>";
}
?>
</ul>
</body>
</html>
