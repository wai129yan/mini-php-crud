<?php 

include 'config/database.php';  

$id = $_GET['id'];
$query = "DELETE FROM items WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);
header("Location: index.php");
