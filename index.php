<?php
include 'config/database.php';

$query = "SELECT * FROM items";
$stmt = $conn->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Items List</title>
</head>
<body>

<h1>Items List</h1>
<a href="create.php">Add New Item</a><br><br><br><br>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item['name'] ?></td>
                <td><?= $item['description'] ?></td>
                <td><img src="uploads/<?= $item['image'] ?>" width="100"></td>
                <td>
                    <a href="update.php?id=<?= $item['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $item['id'] ?>">Delete</a>
                    <a href="details.php?id=<?= $item['id'] ?>">Details</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>