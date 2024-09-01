<?php
require_once '../config.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $sql = "UPDATE restaurants SET name='$name', description='$description', image_url='$image_url' WHERE id='$id'";

    if (mysqli_query($link, $sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
} else {
    $sql = "SELECT * FROM restaurants WHERE id='$id'";
    $result = mysqli_query($link, $sql);
    $restaurant = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Restaurant</h1>
        <form method="POST" action="edit_restaurant.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Restaurant Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($restaurant['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($restaurant['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="<?php echo htmlspecialchars($restaurant['image_url']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Restaurant</button>
        </form>
        <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
