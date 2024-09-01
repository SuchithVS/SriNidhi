<?php
require_once '../config.php';

// Fetch all hotels
$sql = "SELECT * FROM hotels ORDER BY name";
$result = mysqli_query($link, $sql);
$hotels = [];
while ($hotel = mysqli_fetch_assoc($result)) {
    $hotels[] = $hotel;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Hotels</h1>
        <a href="add_hotel.php" class="btn btn-primary mb-3">Add New Hotel</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hotel Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel): ?>
                <tr>
                    <td><?php echo htmlspecialchars($hotel['name']); ?></td>
                    <td><?php echo htmlspecialchars($hotel['description']); ?></td>
                    <td>
                        <a href="edit_hotel.php?id=<?php echo $hotel['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_hotel.php?id=<?php echo $hotel['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this hotel?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
