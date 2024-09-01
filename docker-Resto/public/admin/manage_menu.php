<?php
require_once '../config.php';

$sql = "SELECT * FROM menu_items ORDER BY category, name";
$result = mysqli_query($link, $sql);

$menu_items = [];
while ($item = mysqli_fetch_assoc($result)) {
    $menu_items[] = $item;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Menu</h1>
        <a href="add_menu_item.php" class="btn btn-primary mb-3">Add New Item</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menu_items as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo htmlspecialchars($item['description']); ?></td>
                    <td><?php echo htmlspecialchars($item['price']); ?></td>
                    <td><?php echo htmlspecialchars($item['category']); ?></td>
                    <td>
                        <a href="edit_menu_item.php?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_menu_item.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
