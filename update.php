<?php 

include 'config/database.php';

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    $query = "UPDATE items SET name = ?, description = ? WHERE id = ?";
    $params = [$name, $description, $id];

    if($image) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $query = "UPDATE items SET name = ?, description = ?, image = ? WHERE id = ?";
            $params = [$name, $description, $image, $id];
        }   
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);

    header("Location: index.php");
} else {
    $query = "SELECT * FROM items WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    $item = $stmt->fetch();
}

?>


<form action="update.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
    <input type="text"" name="name" value="<?= $item['name'] ?>" required><br>
    <textarea name="description" required><?= $item['description'] ?></textarea><br>
    <input type="file" name="image"><br>
    <button type="submit">Update</button>
</form>