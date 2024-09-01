<?php
require_once 'config.php';

// Fetch all restaurants from the database
$sql = "SELECT * FROM restaurants";
$result = mysqli_query($link, $sql);

$restaurants = [];
while ($restaurant = mysqli_fetch_assoc($result)) {
    $restaurants[] = $restaurant;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Book a Table at Our Restaurants</h1>
        <div class="row">
            <?php foreach ($restaurants as $restaurant): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo htmlspecialchars($restaurant['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($restaurant['name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($restaurant['name']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($restaurant['description']); ?></p>
                        <a href="booking.php?restaurant_id=<?php echo $restaurant['id']; ?>" class="btn btn-primary">Book a Table</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Admin Dashboard Button -->
        <div class="mt-4">
            <a href="admin/dashboard.php" class="btn btn-secondary">Admin Dashboard</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
