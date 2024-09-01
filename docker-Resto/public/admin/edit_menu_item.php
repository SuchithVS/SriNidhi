<?php
require_once '../config.php';

$id = getGetData('id');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = getPostData('name');
    $description = getPostData('description');
    $price = getPostData('price');
    $category = getPostData('category');
    $image_url = getPostData('image_url');

    $sql = "UPDATE menu_items SET name='$name', description='$description', price='$price', category='$category', image_url='$image_url' WHERE id='$id'";

    if (mysqli_query($link, $sql)) {
        header("Location: manage_menu.php");
        exit();
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
} else {
    $sql = "SELECT * FROM menu_items WHERE id='$id'";
    $result = mysqli_query($link, $sql);
    $item = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Menu Item</h1>
        <form method="POST" action="edit_menu_item.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($item['price']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($item['category']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="url" class="form-control" id="image_url" name="image_url" value="<?php echo htmlspecialchars($item['image_url']); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update Item</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
