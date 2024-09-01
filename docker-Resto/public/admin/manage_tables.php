<?php
require_once '../config.php';

$sql = "SELECT * FROM tables ORDER BY name";
$result = mysqli_query($link, $sql);

$tables = [];
while ($table = mysqli_fetch_assoc($result)) {
    $tables[] = $table;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Tables</h1>
        <a href="add_table.php" class="btn btn-primary mb-3">Add New Table</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Table Name</th>
                    <th>Capacity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tables as $table): ?>
                <tr>
                    <td><?php echo htmlspecialchars($table['name']); ?></td>
                    <td><?php echo htmlspecialchars($table['capacity']); ?></td>
                    <td>
                        <a href="view_reservations.php?table_id=<?php echo $table['id']; ?>" class="btn btn-info btn-sm">View Reservations</a>
                        <a href="delete_table.php?id=<?php echo $table['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this table?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
