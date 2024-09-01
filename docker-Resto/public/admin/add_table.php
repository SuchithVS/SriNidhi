<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = getPostData('name');
    $capacity = getPostData('capacity');

    $sql = "INSERT INTO tables (name, capacity) VALUES ('$name', '$capacity')";

    if (mysqli_query($link, $sql)) {
        header("Location: manage_tables.php");
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
    <title>Add New Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add New Table</h1>
        <form method="POST" action="add_table.php">
            <div class="mb-3">
                <label for="name" class="form-label">Table Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="capacity" class="form-label">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Table</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
