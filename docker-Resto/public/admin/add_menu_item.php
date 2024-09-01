<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = getPostData('name');
    $description = getPostData('description');
    $price = getPostData('price');
    $category = getPostData('category');
    $image_url = getPostData('image_url');

    $sql = "INSERT INTO menu_items (name, description, price, category, image_url) 
            VALUES ('$name', '$description', '$price', '$category', '$image_url')";

    if (mysqli_query($link, $sql)) {
        header("Location: manage_menu.php");
        exit();
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add Menu Item</h1>
        <form method="POST" action="add_menu_item.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="url" class="form-control" id="image_url" name="image_url">
            </div>
            <button type="submit" class="btn btn-primary">Add Item</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
