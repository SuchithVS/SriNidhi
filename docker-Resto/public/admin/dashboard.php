<?php
require_once '../config.php';

// Fetch all restaurants from the database
$sql = "SELECT * FROM restaurants";
$result = mysqli_query($link, $sql);

$restaurants = [];
while ($restaurant = mysqli_fetch_assoc($result)) {
    $restaurants[] = $restaurant;
}

// Fetch all reservations from the database
$sql = "SELECT reservations.*, restaurants.name AS restaurant_name FROM reservations 
        JOIN restaurants ON reservations.restaurant_id = restaurants.id
        ORDER BY reservation_date, reservation_time";
$reservations = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Admin Dashboard</h1>

        <h2 class="mb-4">Manage Restaurants</h2>
        <a href="add_restaurant.php" class="btn btn-primary mb-4">Add New Restaurant</a>
        <div class="row">
            <?php foreach ($restaurants as $restaurant): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo htmlspecialchars($restaurant['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($restaurant['name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($restaurant['name']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($restaurant['description']); ?></p>
                        <a href="edit_restaurant.php?id=<?php echo $restaurant['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_restaurant.php?id=<?php echo $restaurant['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this restaurant?');">Delete</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <h2 class="mb-4">Reservation Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Restaurant</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Guests</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($reservation = mysqli_fetch_assoc($reservations)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($reservation['restaurant_name']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['customer_name']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['customer_email']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['reservation_date']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['reservation_time']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['guests']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="../index.php" class="btn btn-secondary">Back to Home</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
