<?php
include 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    // Save the image in the 'uploads' directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $query = "INSERT INTO items (name, description, image) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$name, $description, $image]);

        header('Location: index.php');
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!-- HTML form -->
<form action="create.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Item Name" required><br>
    <textarea name="description" placeholder="Description" required></textarea><br>
    <input type="file" name="image" required><br>
    <button type="submit">Create</button>
</form>