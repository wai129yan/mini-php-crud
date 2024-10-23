<?php
include 'config/database.php';

$id = $_GET['id'];

$query = "SELECT * FROM items WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);
$item = $stmt->fetch();
?>

<h1>Item Details</h1>
<p>Name: <?= $item['name'] ?></p>
<p>Description: <?= $item['description'] ?></p>
<img src="uploads/<?= $item['image'] ?>" width="200">
<a href="index.php">Back to List</a>